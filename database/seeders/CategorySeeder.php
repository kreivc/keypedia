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
                'image' => 'C1.jpg'
            ],
            [
                'name' => '61 Key Keyboard',
                'image' => 'C2.jpg'
            ],
            [
                'name' => 'XDA Profile',
                'image' => 'C3.jpg'
            ],
            [
                'name' => 'Cherry Profile',
                'image' => 'C4.jpg'
            ],
        ]);
    }
}
