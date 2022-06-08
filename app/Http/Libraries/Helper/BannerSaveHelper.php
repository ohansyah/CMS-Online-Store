<?php

namespace App\Http\Libraries\Helper;

use Illuminate\Http\Request;

/**
 * Save banner data to database
 *
 * @param Request $request
 * @param App\Models\Banner $banner
 * @param App\Traits\ImageTrait\uploadImage $uploadImage
 */

class BannerSaveHelper
{
    public static function saveFromRequest(Request $request, \App\Models\Banner $banner, $uploadImage)
    {
        $banner->name = $request->input('name');
        $banner->description = $request->input('description');
        $banner->type = $request->input('type');
        $banner->start_date = $request->input('start_date');
        $banner->end_date = $request->input('end_date');
        $banner->image = $uploadImage['file_name_to_store'] ?: $banner->image;
        $banner->save();
    }
}
