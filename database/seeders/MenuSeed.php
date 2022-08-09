<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->insert([[
            'parent_id' => null,
            'name' => 'Dashboard',
            'type' => 'menu',
            'classification' => null,
            'icon' => 'bi-grid',
            'route' => 'dashboard',
            'classification_order' => 1,
            'classification_inner_order' => 1,
        ], [
            'parent_id' => null,
            'name' => 'Featured',
            'type' => 'header',
            'classification' => 'Featured',
            'icon' => null,
            'route' => null,
            'classification_order' => 2,
            'classification_inner_order' => 0,
        ], [
            'parent_id' => null,
            'name' => 'Banner',
            'type' => 'menu',
            'classification' => 'Featured',
            'icon' => 'bi-badge-ad',
            'route' => 'banner.index',
            'classification_order' => 2,
            'classification_inner_order' => 1,
        ], [
            'parent_id' => null,
            'name' => 'Master Data',
            'type' => 'header',
            'classification' => 'Master Data',
            'icon' => null,
            'route' => null,
            'classification_order' => 3,
            'classification_inner_order' => 0,
        ], [
            'parent_id' => null,
            'name' => 'Category',
            'type' => 'menu',
            'classification' => 'Master Data',
            'icon' => 'bi-columns-gap',
            'route' => 'category.index',
            'classification_order' => 3,
            'classification_inner_order' => 1,
        ], [
            'parent_id' => null,
            'name' => 'Product',
            'type' => 'menu',
            'classification' => 'Master Data',
            'icon' => 'bi-box-seam',
            'route' => 'product.index',
            'classification_order' => 3,
            'classification_inner_order' => 2,
        ], [
            'parent_id' => null,
            'name' => 'System',
            'type' => 'header',
            'classification' => 'System',
            'icon' => null,
            'route' => null,
            'classification_order' => 4,
            'classification_inner_order' => 0,
        ], [
            'parent_id' => null,
            'name' => 'General Setting',
            'type' => 'menu',
            'classification' => 'System',
            'icon' => 'bi-gear',
            'route' => 'general-setting.index',
            'classification_order' => 4,
            'classification_inner_order' => 1,
        ]]);
    }
}
