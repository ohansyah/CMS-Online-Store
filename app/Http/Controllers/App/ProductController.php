<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search($request)->with(['category', 'productImages'])->sort($request)->paginate(12);
        $products->appends(['category_id' => $request->category_id]);
        return view('app.product.index')
            ->with('products', $products);
    }

    public function show($id)
    {
        $dealOfTheWeeks = Product::with(['category', 'productImages'])->inRandomOrder()->limit(6)->get();
        $product = Product::findOrFail($id);
        return view('app.product.show')
            ->with('product', $product)
            ->with('dealOfTheWeeks', $dealOfTheWeeks);
    }
}
