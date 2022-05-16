<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        DB::table('categories')->insert([[
            'id' => 1,
            'parent_id' => 0,
            'name' => 'Categories',
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/categorize.png',
            'created_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        ], [
            'id' => 2,
            'parent_id' => 1,
            'name' => 'Shirt',
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/shirt.png',
            'created_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        ], [
            'id' => 3,
            'parent_id' => 1,
            'name' => 'Hoodie',
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/jacket.png',
            'created_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        ], [
            'id' => 4,
            'parent_id' => 1,
            'name' => 'T-Shirt',
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/clothes.png',
            'created_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        ], [
            'id' => 5,
            'parent_id' => 1,
            'name' => 'Sneaker',
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/vegan-shoes.png',
            'created_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        ], [
            'id' => 6,
            'parent_id' => 1,
            'name' => 'Trouser',
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/jeans.png',
            'created_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        ],
        ]);

    }
}
