<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Libraries\Helper\BannerSaveHelper;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Traits\BreadCrumb;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class BannerController extends Controller
{
    use ImageTrait, BreadCrumb;

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
                return '<img src=' . $model->image_url . ' class="img-thumbnail-sm" />';
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
    public function store(BannerRequest $request)
    {
        $request->validated();

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;

        // Save banner data to database
        BannerSaveHelper::saveFromRequest($request, new Banner(), $uploadImage);

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
    public function update(BannerRequest $request, $id)
    {
        $request->validated();

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;

        // Save banner data to database
        BannerSaveHelper::saveFromRequest($request, Banner::findOrFail($id), $uploadImage);

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
