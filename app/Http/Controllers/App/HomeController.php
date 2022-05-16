<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::banner()->active()->orderBy('id', 'desc')->limit(5)->get();
        $categories = Categories::parentCategory()->limit(8)->get();
        $products = Product::orderBy('id', 'desc')->paginate(12);
        return view('app.index')
            ->with('banners', $banners)
            ->with('categories', $categories)
            ->with('products', $products);
    }
}
