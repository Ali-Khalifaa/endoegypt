<?php

namespace Database\Seeders;

use App\Models\LatestVideo;
use Illuminate\Database\Seeder;

class LatestVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LatestVideo::truncate();
        LatestVideo::create([
            'video_url'=> '#',
        ]);

    }
}
