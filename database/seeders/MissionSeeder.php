<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Mission::truncate();

        $area = Mission::create([
            'id'   => 1,
        ]);

        $area->setTranslations([
            'ar' => [
                'title'       => 'الرسالة',
                'description' => 'من ناحية أخرى، فإننا ندين بسخط وكراهية الرجال الذين ينخدعون ويفقدون معنوياتهم بسحر المتعة اللحظية، ويعميهم الرغبة، لدرجة أنهم لا يستطيعون توقع الألم والمتاعب التي من المؤكد أنها ستحدث؛ واللوم يقع على عاتق أولئك الذين يفشلون في أداء واجبهم بسبب ضعف الإرادة، وهو نفس القول من خلال التراجع عن العمل والألم',
            ],
            'en' => [
                'title'       => 'Mission',
                'description' => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain',
            ],
        ]);

    }
}
