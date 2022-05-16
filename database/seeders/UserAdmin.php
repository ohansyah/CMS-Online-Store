<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * login url: /public/login
         */
        \DB::table('users')->insert([
            'name' => 'First Admin',
            'email' => 'firstadmin@gmail.com',
            'password' => \Hash::make('Admin123'),
            'image' => 'https://img.icons8.com/ultraviolet/80/000000/user.png',
        ]);
    }
}
