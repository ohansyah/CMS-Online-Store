<?php

namespace App\Http\Libraries\Helper;

use Illuminate\Http\Request;

/**
 * Save generalSetting data to database
 *
 * @param Request $request
 * @param App\Models\GeneralSetting $generalSetting
 */

class GeneralSettingSaveHelper
{
    public static function saveFromRequest(Request $request, \App\Models\GeneralSetting $generalSetting)
    {
        $generalSetting->name = $request->input('name');
        $generalSetting->description = $request->input('description');
        $generalSetting->value = $request->input('value');
        $generalSetting->save();
    }
}
