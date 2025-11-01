<?php

namespace Database\Seeders;

use App\Models\TournamentRegulation;
use Illuminate\Database\Seeder;

class TournamentRegulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TournamentRegulation::truncate();

        $area = TournamentRegulation::create([
            'id'   => 1,
        ]);

        $area->setTranslations([
            'ar' => [
                'title'       => 'معلومات عن البطولة',
                'description' => 'يجب على كل من يقيم في المدرسة، من لاعبين وقادة، دفع تكاليف الإقامة ورسوم المشاركة. تشمل هذه التكلفة بطاقة Gothia و18 وجبة (إفطار، غداء، عشاء) بدءًا من العشاء في 13 يوليو وانتهاءً بالغداء في 19 يوليو. يُسمح بحد أدنى اثنين وأقصى أربعة قادة لكل فريق بالإقامة في المدرسة. يمكنك استئجار المراتب والفراش منا مقابل تكلفة إضافية. إذا أحضرت مرتبتك الخاصة، فلا يمكن أن يزيد عرضها عن 75 سم. نحث جميع المشاركين والقادة على عدم ترك الأشياء الثمينة أو الأموال دون مراقبة في المدرسة',
            ],
            'en' => [
                'title'       => 'tournament informations',
                'description' => 'Everyone staying at the school, players and leaders, has to pay the accommodation cost and participation fee. This cost is inclusive of Gothia Card and 18 meals (breakfast, lunch, dinner) starting with dinner on July 13th and ending with lunch on July 19th. A minimum of two and maximum four leaders per team may stay at the school. You can rent mattresses and bedding from us to an additional cost. If you bring your own mattress it can not be wider than 75 cm. We urge all participants and leaders to never leave valuables or money unattended at the school',
            ],
        ]);

    }
}
