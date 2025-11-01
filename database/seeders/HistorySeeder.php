<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        History::truncate();

        $area = History::create([
            'id'   => 1,
        ]);

        $area->setTranslations([
            'ar' => [
                'title'       => 'التاريخ',
                'description' => 'ولكن يجب أن أشرح لك كيف نشأت كل هذه الفكرة الخاطئة المتمثلة في إدانة المتعة والإشادة بالألم، وسأقدم لك شرحًا كاملاً للنظام، وأشرح التعاليم الفعلية للمستكشف العظيم للحقيقة، وباني السعادة البشرية. لا أحد يرفض المتعة نفسها أو يكرهها أو يتجنبها، لأنها متعة، ولكن لأن أولئك الذين لا يعرفون كيف يسعون إلى المتعة بعقلانية',
            ],
            'en' => [
                'title'       => 'history',
                'description' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally',
            ],
        ]);

    }
}
