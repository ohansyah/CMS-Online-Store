<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search($request)->with(['category','productImages'])->sort($request)->paginate(12);
        return view('app.product.index')->with('products', $products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('app.product.show')->with('product', $product);
    }
}
