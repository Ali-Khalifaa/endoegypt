<?php

namespace Database\Seeders;

use App\Models\learnAbout;
use Illuminate\Database\Seeder;

class learnAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        learnAbout::truncate();

        $data = [
            [
                'name_e' => 'We participated in previous years',
                'name'   => 'شاركنا في السنوات السابقة',
            ],
            [
                'name_e' => 'Internet',
                'name'   => 'الإنترنت',
            ],
            [
                'name_e' => 'Through other club',
                'name'   => 'من خلال نادي آخر',
            ],
            [
                'name_e' => 'Friends',
                'name'   => 'الأصدقاء',
            ],
            [
                'name_e' => 'Ad on internet',
                'name'   => 'إعلان على الإنترنت',
            ],
            [
                'name_e' => 'Other',
                'name'   => 'آخر',
            ],

        ];

        foreach ($data as $key => $value) {
            $created = learnAbout::create([
                'status'   => 1,
            ]);

            $created->setTranslations([
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
