<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'username' => 'manager',
                'dob' => '1996-01-01',
                'gender' => 'Male',
                'address' => 'address address address address address1',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'role' => 'manager',
            ],
            [
                'username' => 'customer',
                'dob' => '1996-01-01',
                'gender' => 'Male',
                'address' => 'address address address address address1',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('asdasdasd'),
                'role' => 'customer',
            ],
        ]);
    }
}
