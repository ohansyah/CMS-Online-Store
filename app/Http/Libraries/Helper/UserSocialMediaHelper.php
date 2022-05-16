<?php

namespace App\Http\Libraries\Helper;

use Illuminate\Http\Request;

class UserSocialMediaHelper
{
    public function getSocialMedia(Request $request)
    {
        $social_media = [];
        if ($request->input('twitter')) {
            $social_media['twitter'] = [
                'class' => 'twitter',
                'icon' => 'bi bi-twitter',
                'link' => $request->input('twitter'),

            ];
        }

        if ($request->input('facebook')) {
            $social_media['facebook'] = [
                'class' => 'facebook',
                'icon' => 'bi bi-facebook',
                'link' => $request->input('facebook'),

            ];
        }

        if ($request->input('instagram')) {
            $social_media['instagram'] = [
                'class' => 'instagram',
                'icon' => 'bi bi-instagram',
                'link' => $request->input('instagram'),

            ];
        }

        if ($request->input('linkedin')) {
            $social_media['linkedin'] = [
                'class' => 'linkedin',
                'icon' => 'bi bi-linkedin',
                'link' => $request->input('linkedin'),

            ];
        }

        return $social_media;
    }
}
