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
                'address' => 'Gg. Suprapto No. 60 Makassar',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('manager123'),
                'role' => 'manager',
            ],
            [
                'username' => 'customer',
                'dob' => '1996-01-01',
                'gender' => 'Male',
                'address' => 'Dk. Ketandan No. 325 Metro',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('customer123'),
                'role' => 'customer',
            ],
        ]);
    }
}
