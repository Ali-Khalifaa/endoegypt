<?php

namespace Database\Seeders;


use App\Models\Counter;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Counter::truncate();

        $Counter = Counter::create([
            'id'   => 1,
            'counter'=> 12000,
        ]);

        $Counter->setTranslations([
            'ar' => [
                'title'       => 'جمع التبرعات',
            ],
            'en' => [
                'title'       => 'Fundraising',
            ],
        ]);
        $Counter = Counter::create([
            'id'   => 2,
            'counter'=> 35455,
        ]);

        $Counter->setTranslations([
            'ar' => [
                'title'       => 'المتطوعين',
            ],
            'en' => [
                'title'       => 'volunteer',
            ],
        ]);
        $Counter = Counter::create([
            'id'   => 3,
            'counter'=> 95342,
        ]);

        $Counter->setTranslations([
            'ar' => [
                'title'       => 'المتبرعين',
            ],
            'en' => [
                'title'       => 'Donor',
            ],
        ]);
        $Counter = Counter::create([
            'id'   => 4,
            'counter'=> 34500,
        ]);

        $Counter->setTranslations([
            'ar' => [
                'title'       => 'الاموال المدفوعة',
            ],
            'en' => [
                'title'       => 'Money paid',
            ],
        ]);

    }
}
