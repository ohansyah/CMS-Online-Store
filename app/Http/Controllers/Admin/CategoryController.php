<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\BreadCrumb;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Libraries\Helper\CategorySaveHelper;
class CategoryController extends Controller
{
    use ImageTrait, BreadCrumb;

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
        return Datatables::of(Category::query())
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
        $categories = Category::pluck('name', 'id')->toArray();
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
    public function store(CategoryRequest $request)
    {
        $request->validated();

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;

        // Save category data to database
        CategorySaveHelper::saveFromRequest($request, new Category(), $uploadImage);

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
        $category = Category::findOrFail($id);
        $category->image_url = url($this->image_storage . '/' . $category->image);
        $categories = Category::pluck('name', 'id')->toArray();

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
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->pluck('name', 'id')->toArray();

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
    public function update(CategoryRequest $request, $id)
    {
        $request->validated();

        $category = Category::findOrFail($id);
        if ($category->parent_id == 0) {
            $request['parent_id'] = 0;
        } else if ($request->input('parent_id') == $category->id) {
            return redirect()->back()->withErrors('Tidak dapat mengubah Parent Category dari Category yang sama')->withInput();
        }

        $category->parent_id = $request->input('parent_id');
        $category->name = $request->input('name');

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;

        // Save category data to database
        CategorySaveHelper::saveFromRequest($request, $category, $uploadImage);

        return redirect('/admin/category')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            Storage::delete($this->image_path . '/' . $category->image);
        }
        $category->delete();
        return redirect('/admin/category')->with('success', 'Category Deleted');
    }
}
