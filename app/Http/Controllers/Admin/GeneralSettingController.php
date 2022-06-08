<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\BreadCrumb;
use App\Models\GeneralSetting;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Admin\GeneralSettingRequest;
use App\Http\Libraries\Helper\GeneralSettingSaveHelper;

class GeneralSettingController extends Controller
{
    use BreadCrumb;

    public function __construct()
    {
        $this->breadcrumb['title'] = 'General Setting';
        $this->breadcrumb['route'] = 'general-setting.index';
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.general-setting.index')->with('breadcrumb', $this->breadcrumb);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable()
    {
        return Datatables::of(GeneralSetting::query())
            ->addColumn('action', 'admin.general-setting.datatable-action')
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.general-setting.create')->with('breadcrumb', $this->BreadCrumbSubtitle('Create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneralSettingRequest $request)
    {
        $request->validated();
        GeneralSettingSaveHelper::saveFromRequest($request, new GeneralSetting());
        return redirect('/admin/general-setting')->with('success', 'General Setting Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generalSetting = GeneralSetting::findOrFail($id);
        return view('admin.general-setting.show')
            ->with('data', $generalSetting)
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
        $generalSetting = GeneralSetting::findOrFail($id);
        return view('admin.general-setting.edit')
            ->with('data', $generalSetting)
            ->with('breadcrumb', $this->BreadCrumbSubtitle('Edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralSettingRequest $request, $id)
    {
        $request->validated();
        GeneralSettingSaveHelper::saveFromRequest($request, GeneralSetting::findOrFail($id));
        return redirect('/admin/general-setting')->with('success', 'General Setting Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generalSetting = GeneralSetting::findOrFail($id)->delete();
        return redirect('/admin/general-setting')->with('success', 'General Setting Deleted');
    }
}
