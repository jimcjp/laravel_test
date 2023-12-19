<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        //添加用戶測試數據
        DB::table('users')->insert([
           'name' => 'aa',
           'email' => 'aa@aa.com',
           'password' => Hash::make('12345678'),
        ]);
    }
}
