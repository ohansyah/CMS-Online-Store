<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Product;
use App\Traits\BreadCrumb;

class DashboardController extends Controller
{
    use BreadCrumb;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->breadcrumb['title'] = 'Dashboard';
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = date('Y-m-d H:i:s');
        $count = [
            'banner' => Banner::count(),
            'banner_active' => Banner::active()->count(),
            'category' => Categories::count(),
            'product' => Product::count(),
        ];
        return view('admin.dashboard.dashboard')
            ->with('breadcrumb', $this->breadcrumb)
            ->with('count', $count);
    }
}
