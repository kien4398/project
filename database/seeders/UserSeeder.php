<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'firstName' => 'A',
                'middleName' => 'Van',
                'lastName' => 'Nguyen',
                'userName' => 'nguyenvana',
                'email' => 'nguyenvana@gmail.com',
                'image' => 'nguyenvana.jpg',
                'password' => bcrypt('123456'),
            ],
            [
                'firstName' => 'B',
                'middleName' => 'Van',
                'lastName' => 'Nguyen',
                'userName' => 'nguyenvanb',
                'email' => 'nguyenvanb@gmail.com',
                'image' => 'nguyenvanb.jpg',
                'password' => bcrypt('123456'),
            ],
        ];
        DB::table('users')->insert($user);
    }
}
