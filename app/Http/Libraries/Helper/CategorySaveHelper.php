<?php

namespace App\Http\Libraries\Helper;

use Illuminate\Http\Request;

/**
 * Save category data to database
 *
 * @param Request $request
 * @param App\Models\Category $category
 * @param App\Traits\ImageTrait\uploadImage $uploadImage
 */

class CategorySaveHelper
{
    public static function saveFromRequest(Request $request, \App\Models\Category $category, $uploadImage)
    {
        $category->parent_id = $request->input('parent_id');
        $category->name = $request->input('name');
        $category->image = isset($uploadImage['file_name_to_store']) ? $uploadImage['file_name_to_store'] : $category->image;
        $category->save();
    }
}
