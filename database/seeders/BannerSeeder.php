<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Banner::truncate();

        Banner::create([
            'id'   => 1,
            'image' => 'rdo.mp4',
            'is_image' => false,
        ]);
    }
}
