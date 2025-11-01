<?php

namespace Database\Seeders;


use App\Models\PopupAd;
use Illuminate\Database\Seeder;

class PopupAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PopupAd::truncate();

        $area = PopupAd::create([
            'id'   => 1,
        ]);

        $area->setTranslations([
            'ar' => [
                'title'       => 'اعلان منبثق',

            ],
            'en' => [
                'title'       => 'popup ad',
            ],
        ]);

    }
}
