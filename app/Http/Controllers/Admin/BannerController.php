<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\BreadCrumb;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class BannerController extends Controller
{

    use ImageTrait;
    use BreadCrumb;

    private $image_path;
    private $image_storage;

    public function __construct()
    {
        $this->image_path = \Config::get('constants.image_path.banner');
        $this->image_storage = \Config::get('constants.image_storage.banner');
        $this->breadcrumb['title'] = 'Banner';
        $this->breadcrumb['route'] = 'banner.index';
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index')->with('breadcrumb', $this->breadcrumb);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable()
    {
        return Datatables::of(Banner::query())
            ->addColumn('image', function ($model) {
                $url = (!filter_var($model->image, FILTER_VALIDATE_URL) === false) ? $model->image : url($this->image_storage . '/' . $model->image);
                return '<img src=' . $url . ' class="img-thumbnail-sm" />';
            })
            ->addColumn('action', 'admin.banner.datatable-action')
            ->rawColumns(['image', 'action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create')->with('breadcrumb', $this->BreadCrumbSubtitle('Create'));
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
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'image|nullable|max:4000',
        ]);

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;

        $banner = new Banner();
        $banner->name = $request->input('name');
        $banner->description = $request->input('description');
        $banner->type = $request->input('type');
        $banner->start_date = $request->input('start_date');
        $banner->end_date = $request->input('end_date');
        $banner->image = $uploadImage['file_name_to_store'] ?: $uploadImage;
        $banner->save();

        return redirect('/admin/banner')->with('success', 'Banner Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->image_url = url($this->image_storage . '/' . $banner->image);
        return view('admin.banner.show')
            ->with('data', $banner)
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
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit')
            ->with('data', $banner)
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
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'image|nullable|max:4000',
        ]);

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;

        $banner = Banner::findOrFail($id);
        $banner->name = $request->input('name');
        $banner->description = $request->input('description');
        $banner->type = $request->input('type');
        $banner->start_date = $request->input('start_date');
        $banner->end_date = $request->input('end_date');
        $banner->image = $uploadImage['file_name_to_store'] ?: $banner->image;

        $banner->save();

        return redirect('/admin/banner')->with('success', 'Banner Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->image) {
            Storage::delete($this->image_path . '/' . $banner->image);
        }

        $banner->delete();
        return redirect('/admin/banner')->with('success', 'Banner Deleted');

    }
}
