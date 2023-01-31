<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotDealSeed extends Seeder
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

        DB::table('hot_deals')->insert([
            [
                'title' => 'Big Sale 50% Off',
                'subtitle' => 'Big Sale All Shoes',
                'image' => 'hotdeals1.jpg',
                'type' => 'product-category',
                'data' => json_encode([
                    "category_id" => "2",
                    "product_total" => "3",
                    "button_text" => "Up to 50% Off",
                ]),
                'start_date' => $faker->dateTimeBetween('-2 week', '-1 week'),
                'end_date' => $faker->dateTimeBetween('+2 week', '+4 week'),
                'created_at' => $now,
            ], [
                'title' => 'Big Sale Limited Time Only',
                'subtitle' => 'Special Product Only',
                'image' => 'hotdeals2.jpg',
                'type' => 'product-list',
                'data' => json_encode([
                    "product_ids" => [6,7,8],
                    "button_text" => "Limited Time Only",
                    "button_link" => "https:\/\/www.nike.com\/id\/",
                ]),
                'start_date' => $faker->dateTimeBetween('-2 week', '-1 week'),
                'end_date' => $faker->dateTimeBetween('+2 week', '+4 week'),
                'created_at' => $now,
            ],
        ]);
    }
}
