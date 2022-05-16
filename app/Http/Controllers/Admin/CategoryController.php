<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Traits\BreadCrumb;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{

    use ImageTrait;
    use BreadCrumb;

    private $image_path;
    private $image_storage;

    public function __construct()
    {
        $this->image_path = \Config::get('constants.image_path.category');
        $this->image_storage = \Config::get('constants.image_storage.category');
        $this->breadcrumb['title'] = 'Category';
        $this->breadcrumb['route'] = 'category.index';
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')->with('breadcrumb', $this->breadcrumb);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable()
    {
        return Datatables::of(Categories::query())
            ->addColumn('parent', function ($model) {
                return $model->parent->name ?? '-';
            })
            ->addColumn('image', function ($model) {
                $url = $model->image ? url($this->image_storage . '/' . $model->image) : '';
                return '<img src=' . $model->image_url . ' class="img-thumbnail-sm" />';
            })
            ->addColumn('action', 'admin.category.datatable-action')
            ->rawColumns(['parent', 'image', 'action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::pluck('name', 'id')->toArray();
        return view('admin.category.create')
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
            'image' => 'image|nullable|max:4000',
        ]);

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;

        $category = new Categories();
        $category->parent_id = $request->input('parent_id');
        $category->name = $request->input('name');
        $category->image = $uploadImage['file_name_to_store'] ?: $uploadImage;
        $category->save();

        return redirect('/admin/category')->with('success', 'Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::findOrFail($id);
        $category->image_url = url($this->image_storage . '/' . $category->image);
        $categories = Categories::pluck('name', 'id')->toArray();

        return view('admin.category.show')
            ->with('data', $category)
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
        $category = Categories::findOrFail($id);
        $categories = Categories::where('id', '!=', $id)->pluck('name', 'id')->toArray();

        return view('admin.category.edit')
            ->with('data', $category)
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|nullable|max:4000',
        ]);

        $category = Categories::findOrFail($id);
        if ($category->parent_id == 0) {
            $request['parent_id'] = 0;
        } else if ($request->input('parent_id') == $category->id) {
            return redirect()->back()->withErrors('Tidak dapat mengubah Parent Category dari Category yang sama')->withInput();
        }

        $category->parent_id = $request->input('parent_id');
        $category->name = $request->input('name');

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;
        $category->image = $uploadImage['file_name_to_store'] ?: $category->image;

        $category->save();

        return redirect('/admin/category')->with('success', 'Category Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        if ($category->image) {
            Storage::delete($this->image_path . '/' . $category->image);
        }
        $category->delete();
        return redirect('/admin/category')->with('success', 'Category Deleted');
    }
}
