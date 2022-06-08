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
        $wa_link = GeneralSetting::where('name', 'wa_link')->first()->value;
        $products = Product::search($request)->with(['category', 'productImages'])->sort($request)->paginate(12);
        $products->appends(['category_id' => $request->category_id]);
        return view('app.product.index')
            ->with('wa_link', $wa_link)
            ->with('products', $products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('app.product.show')->with('product', $product);
    }
}
