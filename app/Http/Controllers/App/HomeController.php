<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\GeneralSetting;
use App\Models\HotDeal;
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
        $wa_link = GeneralSetting::where('name', 'wa_link')->first()->value;
        // $popupBanner = Banner::popup()->active()->first();
        $banners = Banner::banner()->active()->orderBy('id', 'desc')->limit(5)->get();
        $categories = Category::parentCategory()->limit(6)->get();
        $products = Product::with(['category', 'productImages'])->orderBy('id', 'desc')->limit(16)->get();
        $jerseys = Product::with(['category', 'productImages'])->where('category_id', 7)->limit(4)->get();
        $dealOfTheWeeks = Product::with(['category', 'productImages'])->inRandomOrder()->limit(6)->get();
        
        $hotDeals = HotDeal::active()->limit(4)->get();
        foreach ($hotDeals as $hotDeal) {
            $query = Product::with(['category', 'productImages']);
            if ($hotDeal->type == 'product-list') {
                $query->whereIn('id', $hotDeal->data->product_ids);
            } else {
                $query->where('category_id', $hotDeal->data->category_id)
                    ->orderBy('id', 'desc')
                    ->limit($hotDeal->data->product_total);
            }
            $hotDeal->products = $query->get();
        }

        return view('app.index')
            ->with('wa_link', $wa_link)
            // ->with('popupBanner', $popupBanner)
            ->with('banners', $banners)
            ->with('categories', $categories)
            ->with('latestProducts', $products->slice(0, 8))
            ->with('comingProducts', $products->slice(8, 8))
            ->with('jerseys', $jerseys)
            ->with('dealOfTheWeeks', $dealOfTheWeeks)
            ->with('hotDeals', $hotDeals);
    }
}
