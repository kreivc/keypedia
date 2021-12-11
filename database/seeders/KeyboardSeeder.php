<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keyboards')->insert([
            [
                'category_id' => 1,
                'name' => 'Logitech',
                'price' => 200,
                'description' => 'Logitech G502 Proteus Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => '1.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Fantech',
                'price' => 300,
                'description' => 'Fantech G502 Proteus Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => '2.jpg',
            ],
            [
                'category_id' => 3,
                'name' => 'Rexus',
                'price' => 400,
                'description' => 'Rexus G502 Proteus Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => '3.jpg',
            ],
            [
                'category_id' => 1,
                'name' => 'Nvidia',
                'price' => 500,
                'description' => 'Nvidia G502 Proteus Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => '4.jpg',
            ],
        ]);
    }
}
