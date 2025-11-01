<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Color::truncate();

        $colors = [
            ['name' => 'أحمر', 'name_e' => 'Red', 'color_code' => '#FF0000'],
            ['name' => 'أخضر', 'name_e' => 'Green', 'color_code' => '#00FF00'],
            ['name' => 'أزرق', 'name_e' => 'Blue', 'color_code' => '#0000FF'],
            ['name' => 'أصفر', 'name_e' => 'Yellow', 'color_code' => '#FFFF00'],
            ['name' => 'أسود', 'name_e' => 'Black', 'color_code' => '#000000'],
            ['name' => 'أبيض', 'name_e' => 'White', 'color_code' => '#FFFFFF'],
            ['name' => 'برتقالي', 'name_e' => 'Orange', 'color_code' => '#FFA500'],
            ['name' => 'بنفسجي', 'name_e' => 'Purple', 'color_code' => '#800080'],
            ['name' => 'وردي', 'name_e' => 'Pink', 'color_code' => '#FFC0CB'],
            ['name' => 'بني', 'name_e' => 'Brown', 'color_code' => '#A52A2A'],
            ['name' => 'رمادي', 'name_e' => 'Gray', 'color_code' => '#808080'],
            ['name' => 'سماوي', 'name_e' => 'Sky Blue', 'color_code' => '#87CEEB'],
            ['name' => 'فيروزي', 'name_e' => 'Turquoise', 'color_code' => '#40E0D0'],
            ['name' => 'ذهبي', 'name_e' => 'Gold', 'color_code' => '#FFD700'],
            ['name' => 'فضي', 'name_e' => 'Silver', 'color_code' => '#C0C0C0'],
            ['name' => 'كستنائي', 'name_e' => 'Maroon', 'color_code' => '#800000'],
            ['name' => 'زيتوني', 'name_e' => 'Olive', 'color_code' => '#808000'],
            ['name' => 'أرجواني', 'name_e' => 'Magenta', 'color_code' => '#FF00FF'],
            ['name' => 'ليموني', 'name_e' => 'Lime', 'color_code' => '#00FF00'],
            ['name' => 'أزرق داكن', 'name_e' => 'Navy', 'color_code' => '#000080'],
            ['name' => 'أزرق فاتح', 'name_e' => 'Light Blue', 'color_code' => '#ADD8E6'],
            ['name' => 'أخضر فاتح', 'name_e' => 'Light Green', 'color_code' => '#90EE90'],
            ['name' => 'أرجواني فاتح', 'name_e' => 'Light Purple', 'color_code' => '#E6E6FA'],
            ['name' => 'أصفر فاتح', 'name_e' => 'Light Yellow', 'color_code' => '#FFFFE0'],
            ['name' => 'أحمر داكن', 'name_e' => 'Dark Red', 'color_code' => '#8B0000'],
            ['name' => 'أخضر داكن', 'name_e' => 'Dark Green', 'color_code' => '#006400'],
            ['name' => 'أزرق داكن', 'name_e' => 'Dark Blue', 'color_code' => '#00008B'],
            ['name' => 'برتقالي داكن', 'name_e' => 'Dark Orange', 'color_code' => '#FF8C00'],
            ['name' => 'بنفسجي داكن', 'name_e' => 'Dark Purple', 'color_code' => '#4B0082'],
        ];

        foreach ($colors as $key => $value) {
            $color = Color::create([
                'status'   => 1,
                'color_code' => $value['color_code'],
            ]);

            $color->setTranslations([
                'ar' => [
                    'title'       => $value['name'],
                    'description' => '',
                ],
                'en' => [
                    'title'       => $value['name_e'],
                    'description' => '',
                ],
            ]);

        }

    }
}
