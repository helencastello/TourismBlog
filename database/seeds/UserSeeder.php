<?php

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
        DB::table('users')->insert([
            [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'phone' => '081266666666',
                'role' => 'Admin',
                'password' => bcrypt('admin1'),
                'remember_token' => null
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'phone' => '081266666667',
                'role' => 'Admin',
                'password' => bcrypt('admin2'),
                'remember_token' => null
            ],
            [
                'name' => 'admin3',
                'email' => 'admin3@gmail.com',
                'phone' => '081266666668',
                'role' => 'Admin',
                'password' => bcrypt('admin3'),
                'remember_token' => null
            ]
        ]);
    }
}
