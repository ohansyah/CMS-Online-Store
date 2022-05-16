<?php

namespace App\Traits;

trait BreadCrumb
{
    public $breadcrumb = [
        'title' => 'Title',
        'route' => 'dashboard',
    ];

    public function BreadCrumbSubtitle($subtitle = null)
    {
        $subtitle ? $this->breadcrumb['subtitle'] = $subtitle : '';
        return $this->breadcrumb;
    }

}
