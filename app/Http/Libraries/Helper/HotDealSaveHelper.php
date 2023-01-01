<?php

namespace App\Http\Libraries\Helper;

use Illuminate\Http\Request;

/**
 * Save hot-deal data to database
 *
 * @param Request $request
 * @param App\Models\HotDeal $hotDeal
 * @param App\Traits\ImageTrait\uploadImage $uploadImage
 */

class HotDealSaveHelper
{
    public static function saveFromRequest(Request $request, \App\Models\HotDeal $hotDeal, $uploadImage)
    {
        $hotDeal->title = $request->input('title');
        $hotDeal->subtitle = $request->input('subtitle');
        $hotDeal->type = $request->input('type');
        $hotDeal->start_date = $request->input('start_date');
        $hotDeal->end_date = $request->input('end_date');
        $hotDeal->image = $uploadImage['file_name_to_store'] ?: $hotDeal->image;

        // mapping data
        $data = [];
        if ($request->input('type') == 'product-list') {
            $data = [
                'product_ids' => $request->input('product_ids'),
                'button_text' => $request->input('button_text'),
                'button_link' => $request->input('button_link'),
            ];
        } else {
            $data = [
                'category_id' => $request->input('category_id'),
                'product_total' => $request->input('product_total'),
                'button_text' => $request->input('button_text'),
            ];
        }
        $hotDeal->data = json_encode($data);

        $hotDeal->save();
    }
}
