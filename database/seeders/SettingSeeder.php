<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();
        $contact = Setting::create([
            'breadcrumb_image' => 'default_breadcrumb.jpg',
            'header_image'     => 'default_header.png',
            'footer_image'     => 'default_footer.png',
        ]);

        $contact->setTranslations([

            'en' => [
                'title'       => 'setting',
                'description' => 'Providing humanitarian and social support to needy individuals and families through sustainable development projects that promote self-reliance and contribute to building a more cohesive and just society.',
            ],
            'ar' => [
                'title'       => 'setting',
                'description' => 'تقديم الدعم الإنساني والاجتماعي للأفراد والأسر المحتاجة من خلال مشاريع التنمية المستدامة التي تعزز الاعتماد على الذات وتساهم في بناء مجتمع أكثر تماسكاً وعدالة.',
            ],

        ]);
    }
}
