<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactUs::truncate();
        $contact = ContactUs::create([
            'phone_one' => '+2390-875-2235',
            'phone_two' => '+3453-909-6565',
            'email_one' => 'email@one.test',
            'email_two' => 'email@two.test',
        ]);

        $contact->setTranslations([

            'en' => [
                'title'       => '503 Old Buffalo Street Northwest #205, New York-3087',
            ],
            'ar' => [
                'title'       => '503 شارع الجاموس القديم شمال غرب # 205 ، نيويورك - 3087',
            ],

        ]);
    }
}
