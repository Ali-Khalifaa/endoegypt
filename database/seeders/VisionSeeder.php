<?php

namespace Database\Seeders;


use App\Models\Vision;
use Illuminate\Database\Seeder;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Vision::truncate();

        $area = Vision::create([
            'id'   => 1,
        ]);

        $area->setTranslations([
            'ar' => [
                'title'       => 'الرؤية',
                'description' => 'في الواقع، يتهمون ويوستو أوديو كرامة دوسيموس بأن الخداع المتعمد يفسد الضرر الذي يلحقه الفاسدون من آلام وما عدا ذلك من الرغبات غير الطوعية، كما هو الحال في الذنب الذي يحرمه المكتب من الآلام، وهو عمل وألم fuga.ولكن في ظروف معينة وبسبب مطالبات الواجب أو التزامات العمل، كثيرًا ما تحدث تلك المتع',
            ],
            'en' => [
                'title'       => 'Vision',
                'description' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti the atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures',
            ],
        ]);

    }
}
