<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\BreadCrumb;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{

    use ImageTrait;
    use BreadCrumb;

    private $image_path;
    private $image_storage;

    public function __construct()
    {
        $this->image_path = \Config::get('constants.image_path.product');
        $this->image_storage = \Config::get('constants.image_storage.product');
        $this->breadcrumb['title'] = 'Product';
        $this->breadcrumb['route'] = 'product.index';
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index')->with('breadcrumb', $this->breadcrumb);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable()
    {
        return Datatables::of(Product::query())
            ->addColumn('category', function ($model) {
                return $model->category->name ?? '-';
            })
            ->addColumn('image', function ($model) {
                return '<img src=' . $model->cover_image_url . ' class="img-thumbnail-sm" />';
            })
            ->addColumn('action', 'admin.product.datatable-action')
            ->rawColumns(['category', 'image', 'action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::parentCategory()->pluck('name', 'id')->toArray();
        return view('admin.product.create')
            ->with('categories', $categories)
            ->with('breadcrumb', $this->BreadCrumbSubtitle('Create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'images' => 'array|max:5',
            'images.*' => 'image|required|max:4000',
        ]);

        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();

        // handling file upload
        foreach ($request->file('images') as $image) {
            $uploadImage = $this->uploadImage($image, $this->image_path);
            $product->productImages()->create([
                'image' => $uploadImage['file_name_to_store'],
                'is_cover' => 0,
            ]);
        }

        return redirect('/admin/product')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['productImages' => function ($query) {
            $query->orderBy('is_cover', 'desc');
        }])->findOrFail($id);

        $categories = Category::pluck('name', 'id')->toArray();
        return view('admin.product.show')
            ->with('data', $product)
            ->with('categories', $categories)
            ->with('breadcrumb', $this->BreadCrumbSubtitle('Detail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with(['productImages' => function ($query) {
            $query->orderBy('is_cover', 'desc');
        }])->findOrFail($id);
        $categories = Category::parentCategory()->pluck('name', 'id')->toArray();

        return view('admin.product.edit')
            ->with('data', $product)
            ->with('categories', $categories)
            ->with('breadcrumb', $this->BreadCrumbSubtitle('Edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateRequests = [
            'name' => 'required',
            'category_id' => 'required',
        ];

        if ($request->hasFile('images')) {
            $validateRequests = array_merge($validateRequests, [
                'images.*' => 'image|nullable|mimes:jpg,jpeg,png|max:2000',
            ]);
        }

        $this->validate($request, $validateRequests);

        $product = Product::findOrFail($id);

        // validate total image
        $count_deleted = $request->deleted_images ? count($request->deleted_images) : 0;
        $count_new = $request->images ? count($request->images) : 0;
        $count_existing = $product->productImages()->count();
        $max_image = \Config::get('constants.max_product_image');
        if ($count_existing - $count_deleted + $count_new > $max_image) {
            return redirect()->back()->with('error', 'Max ' . $max_image . ' images allowed');
        }

        // save product
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();

        // deleted images
        if ($request->deleted_images) {
            $product->productImages()->whereIn('id', $request->deleted_images)->delete();
        }

        // handling file upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uploadImage = $this->uploadImage($image, $this->image_path);
                $product->productImages()->create([
                    'image' => $uploadImage['file_name_to_store'],
                    'is_cover' => 0,
                ]);
            }
        }

        return redirect('/admin/product')->with('success', 'Product Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::with('productImages')->findOrFail($id);
        if ($product->productImages->count() > 0) {
            foreach ($product->productImages as $image) {
                Storage::delete($this->image_path . '/' . $image->image);
            }
        }

        $product->delete();
        return redirect('/admin/product')->with('success', 'Product Deleted');
    }
}
