<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Libraries\Helper\BannerSaveHelper;
// use App\Http\Requests\Admin\BannerRequest;
use App\Models\Category;
use App\Models\HotDeal;
use App\Models\Product;
use App\Traits\BreadCrumb;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Admin\HotDealRequest;
use App\Http\Libraries\Helper\HotDealSaveHelper;

class HotDealsController extends Controller
{
    use ImageTrait, BreadCrumb;

    private $image_path;
    private $image_storage;

    public function __construct()
    {
        $this->image_path = \Config::get('constants.image_path.hot_deals');
        $this->image_storage = \Config::get('constants.image_storage.hot_deals');
        $this->breadcrumb['title'] = 'Hot Deals';
        $this->breadcrumb['route'] = 'hot-deals.index';
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hot-deal.index')->with('breadcrumb', $this->breadcrumb);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable()
    {
        return Datatables::of(HotDeal::query())
            ->addColumn('image', function ($model) {
                return '<img src=' . $model->image_url . ' class="img-thumbnail-sm" />';
            })
            ->addColumn('status', function ($model) {
                return $model->status ? '<span class="badge bg-primary">Active</span>' : '<span class="badge bg-secondary">Inactive</span>';
            })
            ->addColumn('action', 'admin.hot-deal.datatable-action')
            ->rawColumns(['image', 'status', 'action'])
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
        $products = Product::orderBy('name', 'asc')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
        
        return view('admin.hot-deal.create')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('breadcrumb', $this->BreadCrumbSubtitle('Create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotDealRequest $request)
    {
        $request->validated();

        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;
        HotDealSaveHelper::saveFromRequest($request, new HotDeal(), $uploadImage);

        return redirect('/admin/hot-deals')->with('success', 'Hot Deals Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotDeal = HotDeal::findOrFail($id);
        $hotDeal->image_url = url($this->image_storage . '/' . $hotDeal->image);
        
        $categories = Category::parentCategory()->pluck('name', 'id')->toArray();
        $products = Product::orderBy('name', 'asc')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
            
        return view('admin.hot-deal.show')
            ->with('data', $hotDeal)
            ->with('categories', $categories)
            ->with('products', $products)
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
        $hotDeal = HotDeal::findOrFail($id);
        $hotDeal->image_url = url($this->image_storage . '/' . $hotDeal->image);
        
        $categories = Category::parentCategory()->pluck('name', 'id')->toArray();
        $products = Product::orderBy('name', 'asc')
            ->get()
            ->pluck('name', 'id')
            ->toArray();

        return view('admin.hot-deal.edit')
            ->with('data', $hotDeal)
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('breadcrumb', $this->BreadCrumbSubtitle('Detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotDealRequest $request, $id)
    {
        $request->validated();

        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;
        HotDealSaveHelper::saveFromRequest($request, HotDeal::findOrFail($id), $uploadImage);

        return redirect('/admin/hot-deals')->with('success', 'Hot Deals Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotDeal = HotDeal::findOrFail($id);
        if ($hotDeal->image) {
            Storage::delete($this->image_path . '/' . $hotDeal->image);
        }

        $hotDeal->delete();
        return redirect('/admin/hot-deals')->with('success', 'Hot Deals Deleted');
    }
}
