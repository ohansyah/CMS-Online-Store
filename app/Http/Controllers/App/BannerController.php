<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::banner()->active()->orderBy('id', 'desc')->paginate(5);
        return view('app.banner.index')->with('banners', $banners);
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('app.banner.show')->with('banner', $banner);
    }
}
