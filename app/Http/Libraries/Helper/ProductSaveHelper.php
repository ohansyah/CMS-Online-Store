<?php

namespace App\Http\Libraries\Helper;

use Illuminate\Http\Request;

/**
 * Save product data to database
 *
 * @param Request $request
 * @param App\Models\Product $product
 */

class ProductSaveHelper
{
    public static function saveFromRequest(Request $request, \App\Models\Product $product)
    {
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

        return $product;
    }
}
