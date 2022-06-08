<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::insert([
            'name' => 'wa_link',
            'description' => 'Whatsapp Link',
            'value' => 'https://wa.me/6281234123412',
        ]);
    }
}
