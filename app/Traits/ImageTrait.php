<?php

namespace App\Traits;

trait ImageTrait
{
    // handling file upload
    function uploadImage($image, $path)
    {
        $file_name_with_ext = $image->getClientOriginalName();
        $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
        $file_ext = $image->getClientOriginalExtension();
        $file_name_to_store = \Str::slug($file_name) . '_' . time() . '.' . $file_ext;
        $path = $image->storeAs($path, $file_name_to_store);

        return ['path' => $path, 'file_name_to_store' => $file_name_to_store];
    }
}
