<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => '87 Key Keyboard',
                'image' => '1.jpg'
            ],
            [
                'name' => '61 Key Keyboard',
                'image' => '2.jpg'
            ],
            [
                'name' => 'XDA Profile',
                'image' => '3.jpg'
            ],
            [
                'name' => 'Cherry Profile',
                'image' => '4.jpg'
            ],
        ]);
    }
}
