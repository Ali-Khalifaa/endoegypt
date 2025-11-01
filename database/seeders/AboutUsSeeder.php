<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        AboutUs::truncate();

        $area = AboutUs::create([
            'id'   => 1,
        ]);

        $area->setTranslations([
            'ar' => [
                'title'       => 'عنا',
                'description' => 'هذا هو قسم عنا',
            ],
            'en' => [
                'title'       => 'About Us',
                'description' => 'This is about us section',
            ],
        ]);

    }
}
