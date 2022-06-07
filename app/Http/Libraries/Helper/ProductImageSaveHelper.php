<?php

namespace App\Http\Libraries\Helper;

use Illuminate\Http\Request;
use App\Traits\ImageTrait;

/**
 * Save product images data to database
 *
 * @param Request $request
 * @param App\Models\Product $product
 * @param string $image_path
 */

class ProductImageSaveHelper
{
    use ImageTrait;

    public function saveFromRequest(Request $request, \App\Models\Product $product, $image_path)
    {
        foreach ($request->file('images') as $image) {
            $uploadImage = $this->uploadImage($image, $image_path);
            $product->productImages()->create([
                'image' => $uploadImage['file_name_to_store'],
                'is_cover' => 0,
            ]);
        }
    }
}
