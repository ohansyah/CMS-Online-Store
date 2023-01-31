<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeed extends Seeder
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

        DB::table('banners')->insert([
            [
                'name' => 'Nike Venture Runner',
                'type' => 'home',
                'image' => 'home1.png',
                'start_date' => $faker->dateTimeBetween('-2 week', '-1 week'),
                'end_date' => $faker->dateTimeBetween('+2 week', '+4 week'),
                'description' => '<p><span style="color: rgb(17, 17, 17);">Let your design shine in satin, keep it classic in canvas and get luxe with leather. No matter what you choose, these AF-1s are all about you. 12 classic colour choices and an additional Gum option for the sole mean your shoe is destined to be one of a kind, just like you.</span></p>',
                'created_at' => $now,
            ], [
                'name' => 'Nike Infinity Run 3 A.I.R. x Hola Lou',
                'type' => 'home',
                'image' => 'home2.png',
                'start_date' => $faker->dateTimeBetween('-2 week', '-1 week'),
                'end_date' => $faker->dateTimeBetween('+2 week', '+4 week'),
                'description' => '<p><span style="color: rgb(17, 17, 17);">Let your design shine in satin, keep it classic in canvas and get luxe with leather. No matter what you choose, these AF-1s are all about you. 12 classic colour choices and an additional Gum option for the sole mean your shoe is destined to be one of a kind, just like you.</span></p>',
                'created_at' => $now,
            ], [
                'name' => 'Nike React Infinity Run Flyknit 3',
                'type' => 'popup',
                'image' => 'popup1.png',
                'start_date' => $faker->dateTimeBetween('-2 week', '-1 week'),
                'end_date' => $faker->dateTimeBetween('+2 week', '+4 week'),
                'description' => '<p><span style="color: rgb(17, 17, 17);">Let your design shine in satin, keep it classic in canvas and get luxe with leather. No matter what you choose, these AF-1s are all about you. 12 classic colour choices and an additional Gum option for the sole mean your shoe is destined to be one of a kind, just like you.</span></p>',
                'created_at' => $now,
            ],
        ]);
    }
}
