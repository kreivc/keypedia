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
                'name' => 'Logitech 1G502 Japanese Version',
                'price' => 100,
                'description' => 'Logitech 1G502 Japanese Version Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K1.jpg',
            ],
            [
                'category_id' => 1,
                'name' => 'Fantech 1UR4 Amaze Bold',
                'price' => 120,
                'description' => 'Fantech 1UR4 Amaze Bold Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K2.jpg',
            ],
            [
                'category_id' => 1,
                'name' => 'Rexus Classic 11UAR',
                'price' => 90,
                'description' => 'Rexus Classic 11UAR Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K3.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Nvidia 2XX1 Gaming Keyboard',
                'price' => 130,
                'description' => 'Nvidia 2XX1 Gaming Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K4.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Logitech 2RU2 Smart Keyboard',
                'price' => 150,
                'description' => 'Logitech 2RU2 Smart Keyboard Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K5.jpg',
            ],
            [
                'category_id' => 3,
                'name' => 'Razer Chroma Gaming Keyboard 333U',
                'price' => 200,
                'description' => 'Razer Chroma Gaming Keyboard 333U with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K6.jpg',
            ],
            [
                'category_id' => 3,
                'name' => 'Digital Alliance 3000 Best',
                'price' => 125,
                'description' => 'Digital Alliance 3000 Best Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K7.jpg',
            ],
            [
                'category_id' => 3,
                'name' => 'Keychoice 3U2 Model',
                'price' => 80,
                'description' => 'Keychoice 3U2 Model Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K8.jpg',
            ],
            [
                'category_id' => 4,
                'name' => 'Armagera 4U2 Online U',
                'price' => 50,
                'description' => 'Armagera 4U2 Online U Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K9.jpg',
            ],
            [
                'category_id' => 4,
                'name' => 'Dragon 404 RZR Pro',
                'price' => 320,
                'description' => 'Dragon 404 RZR Pro Keyboard with RGB LED Backlit Keyboard with Numeric Keypad and Scrolling LED Backlight Keyboard with Numeric Keypad and Scrolling LED Backlight',
                'image' => 'K10.jpg',
            ],
        ]);
    }
}
