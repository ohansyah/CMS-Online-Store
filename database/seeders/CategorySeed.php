<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $now = date('Y-m-d H:i:s');

        DB::table('categories')->insert([[
            'id' => 1,
            'parent_id' => 0,
            'name' => 'Categories',
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/categorize.png',
            'created_at' => $now,
        ], [
            'id' => 2,
            'parent_id' => 1,
            'name' => 'Shoes',
            'image' => 'shoes.png',
            'created_at' => $now,
        ], [
            'id' => 3,
            'parent_id' => 1,
            'name' => 'Sandals',
            'image' => 'sandal.png',
            'created_at' => $now,
        ], [
            'id' => 4,
            'parent_id' => 1,
            'name' => 'Hat',
            'image' => 'hat.png',
            'created_at' => $now,
        ], [
            'id' => 5,
            'parent_id' => 1,
            'name' => 'Jackets',
            'image' => 'jacket.png',
            'created_at' => $now,
        ], [
            'id' => 6,
            'parent_id' => 1,
            'name' => 'Bag',
            'image' => 'bag.png',
            'created_at' => $now,
        ], [
            'id' => 7,
            'parent_id' => 1,
            'name' => 'Jersey',
            'image' => 'jersey.png',
            'created_at' => $now,
        ],
        ]);

    }
}
