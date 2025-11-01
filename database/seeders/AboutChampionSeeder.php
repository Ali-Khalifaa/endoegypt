<?php

namespace Database\Seeders;

use App\Models\AboutChampion;
use Illuminate\Database\Seeder;

class AboutChampionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        AboutChampion::truncate();

        $area = AboutChampion::create([
            'id'   => 1,
        ]);

        $area->setTranslations([
            'ar' => [
                'title'       => 'عن البطل',
                'description' => 'هذا هو قسم عن البطل',
            ],
            'en' => [
                'title'       => 'About Champion',
                'description' => 'This is about champion section',
            ],
        ]);

    }
}
