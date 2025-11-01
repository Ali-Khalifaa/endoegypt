<?php

namespace Database\Seeders;


use App\Models\OrganizingCommittee;
use Illuminate\Database\Seeder;

class OrganizingCommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        OrganizingCommittee::truncate();

        $Organizing = OrganizingCommittee::create([
            'id'   => 1,
            'image' => 'DrSayedElAkhras.jpg',
            'job' => 'Consultant in assisted reproductive medicine and surgery'
        ]);

        $Organizing->setTranslations([
            'ar' => [
                'title'       => 'الدكتور سيد الأخرس',
                'description' => "استشاري في طب وجراحة الإنجاب المساعد
                    استشاري جراحة المناظير المتقدمة وبطانة الرحم المهاجرة
                    مؤسس ورئيس الجمعية المصرية العلمية لبطانة الرحم المهاجرة (إندو إيجيبت)
                    زمالة في المناظير المتقدمة وبطانة الرحم المهاجرة، أتلانتا، جورجيا، الولايات المتحدة الأمريكية
                    ماجستير في جراحة أمراض النساء طفيفة التوغل من الجمعية المصرية لجراحات التجميل (ESGE)، بلجيكا
                    مدير مركز تدريب الجمعية المصرية لجراحات التجميل (GESEA) - فرع القاهرة",
            ],
            'en' => [
                'title'       => 'Dr Sayed ElAkhras',
                'description' => "Consultant in assisted reproductive medicine and surgery
                                    Consultant of advanced endoscopic surgery and endometriosis
                                    Founder and Chairman of the Scientific Egyptian Society of Endometriosis (EndoEgypt)
                                    Fellowship in advanced Endoscopy & endometriosis, Atlanta, Georgia, USA
                                    ESGE Master of Minimally-Invasive Gynecological Surgery, Belgium
                                    Director of the GESEA training center – Cairo branch",
            ],
        ]);

        $Organizing = OrganizingCommittee::create([
            'id'   => 2,
            'image' => 'ProfErtanSaridogan.jpg',
            'job' => 'President, European Society for Gynaecological Endoscopy (ESGE)'
        ]);

        $Organizing->setTranslations([
            'ar' => [
                'title'       => "الأستاذ الدكتور إرتان ساريدوكان",
                'description' => "رئيس الجمعية الأوروبية لتنظير أمراض النساء (ESGE)
طبيب أمراض نساء وأستاذ جراحة أمراض النساء، معروف بخبرته في طب الإنجاب والجراحة محدودة التدخل (بالمنظار والرحم). اعتبارًا من أواخر عام 2025، يشغل منصب رئيس الجمعية الأوروبية لتنظير أمراض النساء (ESGE)، وهي هيئة دولية رائدة تُعزز التميز والابتكار في جراحة أمراض النساء قليلة التوغل.

الخلفية المهنية
يمارس البروفيسور ساريدوغان عمله في مستشفيات كلية لندن الجامعية (UCLH)، حيث يلعب دورًا محوريًا في تطوير الرعاية الجراحية والتعليم في مجال جراحة الإنجاب والجراحة التنظيرية. بالإضافة إلى ذلك، يعمل استشاريًا في مركز الصحة الإنجابية والوراثية (CRGH)، إحدى عيادات الخصوبة الرائدة في المملكة المتحدة. القيادة والانتماءات
رئيس الجمعية الأوروبية لتنظير أمراض النساء (ESGE)
الرئيس السابق للجمعية البريطانية لتنظير أمراض النساء (BSGE)
رئيس الجمعية الدولية لجراحة الإنجاب (ISRS)",
            ],
            'en' => [
                'title'       => 'Prof. Ertan Saridogan',
                'description' => "President, European Society for Gynaecological Endoscopy (ESGE)
Gynecologist and professor of gynaecological surgery, renowned for his expertise in reproductive medicine and minimal access (laparoscopic and hysteroscopic) surgery. As of late 2025, he serves as the President of the European Society for Gynaecological Endoscopy (ESGE) — a leading international body promoting excellence and innovation in minimally invasive gynaecological surgery.
Professional Background
Prof. Saridogan practices at University College London Hospitals (UCLH), where he plays a pivotal role in advancing surgical care and education in reproductive and endoscopic surgery. In addition, he serves as a consultant at the Centre for Reproductive and Genetic Health (CRGH), one of the UK’s leading fertility clinics.
Leadership & Affiliations
President, European Society for Gynaecological Endoscopy (ESGE)
Past President, British Society for Gynaecological Endoscopy (BSGE)
President, International Society of Reproductive Surgery (ISRS)
",
            ],
        ]);

        $Organizing = OrganizingCommittee::create([
            'id'   => 3,
            'image' => 'ProfMohamedHamed.jpg',
            'job' => 'Secretary General'
        ]);

        $Organizing->setTranslations([
            'ar' => [
                'title'       => 'الأستاذ الدكتور محمد حامد',
                'description' => "دكتور في الطب، عضو في الكلية الملكية لأمراض النساء والتوليد، دبلوم الجامعات الأوروبية في تنظير أمراض النساء، جراح في أمراض النساء قليلة التوغل، أستاذ في أمراض النساء والتوليد، كلية الطب، جامعة عين شمس
استشاري في تقنيات الإنجاب المساعد (ART)، وجراحة أمراض النساء قليلة التوغل (MIGS)
عضو في الكلية الملكية لأمراض النساء والتوليد، المملكة المتحدة
دبلوم الجامعات الأوروبية في تنظير أمراض النساء، فرنسا
جراح في أمراض النساء قليلة التوغل، بلجيكا
الرئيس الأعلى لمركز تدريب GESEA القاهرة (GCTC)
",
            ],
            'en' => [
                'title'       => 'Prof. Mohamed Hamed',
                'description' => "MD, MRCOG, EUDOG, MIGS
Professor of Obstetrics and Gynecology, Faculty of Medicine, Ain Shams University
Consultant of Assisted Reproductive Technologies (ART), and  Minimally-Invasive Gynecological Surgery (MIGS)
Member of the Royal College of Obstetrics and Gynecology, UK
European Universities Diploma of Gynecological Endoscopy, France
Minimally Invasive gynecological Surgeon, Belgium
Chief Mentor of the GESEA Cairo Training Centre (GCTC)
",
            ],
        ]);


        $Organizing = OrganizingCommittee::create([
            'id'   => 4,
            'image' => 'DrAhmedFaheem.jpg',
            'job' => 'General Coordinator'
        ]);

        $Organizing->setTranslations([
            'ar' => [
                'title'       => 'الدكتور أحمد فهيم',
                'description' => "استشارية أمراض النساء والتوليد
رئيسة قسم مستشفى مصر للطيران.
عضو وأمين صندوق الجمعية المصرية لبطانة الرحم المهاجرة.",
            ],
            'en' => [
                'title'       => 'Dr. Ahmed Faheem',
                'description' => "Consultant of Obs & Gyn
Head of Dept.  Egypt air hospital.
Member and  Treasurer  of the Egyptian Endometriosis Association.",
            ],
        ]);

             $Organizing = OrganizingCommittee::create([
            'id'   => 5,
            'image' => 'DrMohamedKandeel.jpg',
            'job' => 'Head of Organizing committee'
        ]);

        $Organizing->setTranslations([
            'ar' => [
                'title'       => 'الدكتورة محمد قنديل',
                'description' => "استشاري أمراض النساء والتوليد
استشاري جراحة الإنجاب المساعدة وجراحة المناظير النسائية
دبلوم من الجامعات الأوروبية في المناظير النسائية، جامعة أوفيرني، فرنسا",
            ],
            'en' => [
                'title'       => 'Dr Mohamed Kandeel',
                'description' => "Consultant of O&G
Consultant of assisted Reproductive surgery & Gyneclolgic Endoscopic  surgery 
European Universities Diploma of Gynecological Endoscopy, Auvergne university, France
",
            ],
        ]);


         $Organizing = OrganizingCommittee::create([
            'id'   => 6,
            'image' => 'DrHatemFarouk.jpg',
            'job' => 'Head of Organizing committee'
        ]);

        $Organizing->setTranslations([
            'ar' => [
                'title'       => 'الدكتور حاتم فاروق',
                'description' => "رئيس اللجنة المنظمة | مستشفى أمم
عضو مجلس إدارة مجموعة مستشفيات أمم، يساهم في التخطيط الاستراتيجي وتطوير خدمات الرعاية الصحية متعددة التخصصات.
رئيس اللجنة المنظمة للمؤتمرات الطبية الوطنية والدولية والبرامج التعليمية.
عضو في الجمعية المصرية لبطانة الرحم المهاجرة (إندو إيجيبت)، يساهم بفعالية في مبادرات التوعية والتثقيف ودعم المرضى.
عضو في فريق عمل البحث والبيانات في مستشفى أمم، ويركز على تطوير المعرفة السريرية والممارسات القائمة على الأدلة في مجال طب النساء الأقل بضعاً.
خبرة تزيد عن 20 عاماً في قيادة الرعاية الصحية، وعمليات المستشفيات، وتنسيق البرامج الاستراتيجية.",
            ],
            'en' => [
                'title'       => 'Dr Hatem Farouk',
                'description' => "Head of Organizing Committee | Omam Hospital
Board Member of Omam Hospitals Group, contributing to strategic planning and development of multidisciplinary healthcare services.  
Head of the Organizing Committee for national and international medical conferences and educational programs.
Member of the Egyptian Association of Endometriosis (Endo Egypt), actively contributing to awareness, education, and patient support initiatives.
Part of the Research & Data Work Team at Omam Hospital, focusing on advancing clinical knowledge and evidence-based practice in minimally invasive gynecology.
Over 20 years of experience in healthcare leadership, hospital operations, and strategic program coordination.
",
            ],
        ]);





          $Organizing = OrganizingCommittee::create([
            'id'   => 7,
            'image' => 'ProfVasiliosTanos.jpg',
            'job' => 'Scientific Chairman'
        ]);

        $Organizing->setTranslations([
            'ar' => [
                'title'       => "الأستاذ الدكتور فاسيليوس تانوس",
                'description' => "دكتور في الطب، دكتور في الفلسفة، أستاذ في أمراض النساء والتوليد. يعمل الدكتور تانوس في مستشفى أريتايو في نيقوسيا، استشاريًا في أمراض النساء ورئيسًا لوحدة طب وجراحة الإنجاب وأطفال الأنابيب.

وهو عضو في المجلس التنفيذي للجمعية الأوروبية لتنظير أمراض النساء (ESGE)، والمدير العلمي للأكاديمية الأوروبية لجراحة أمراض النساء (EAGS)، ورئيس برنامج GESEA (تعليم وتقييم جراحة المناظير النسائية) التابع للجمعية الأوروبية لجراحة أمراض النساء.

وكان منسقًا سابقًا لبرنامج اعتماد الجمعية الأوروبية لجراحة المناظير التناسلية (ECRES) التابع للجمعية الأوروبية لجراحة أمراض النساء والتوليد (ESHRE)، ومنسقًا سابقًا لمجموعة RS SIG التابعة للجمعية الأوروبية لجراحة المناظير التناسلية (ESHRE). وكان الأمين العام السابق للجمعية الأوروبية لجراحة أمراض النساء والتوليد (ESGE)، ونائب رئيس الجمعية الأوروبية لجراحة أمراض النساء والتوليد (MESGE).

نشر الدكتور تانوس أكثر من 300 مقال في مجلات علمية دولية، وكتب، وعروض فيديو على الإنترنت، و290 عرضًا شفهيًا في اجتماعات علمية دولية، منها 190 عرضًا كمتحدث مدعو. عمل كجراح مدعو ومدرس في العديد من البلدان المختلفة في أوروبا الوسطى وآسيا.",
            ],
            'en' => [
                'title'       => "Prof. Vasilios Tanos",
                'description' => "MD, PhD, Professor in Obstetrics and Gynaecology. Dr Tanos is working at Aretaeio Hospital in Nicosia, as a consultant Gynaecologist and head of the Reproductive Medicine & Surgery & IVF unit.

He is one of the European Society of Gynaecological Endoscopy (ESGE) executive board members, the Scientific Director of the European Academy for Gynaecological Surgery (EAGS) and Chairs the GESEA program (Gynaecological Endoscopic Surgery Education and Assessment) by ESGE
Past Co-ordinator of the ESHRE Certification Reproductive Endoscopic Surgery (ECRES) and past coordinator of the RS SIG in ESHRE. Ex-Secretary General of ESGE and past vice president of the MESGE.

 He published over 300 articles in international scientific journals, books, web video presentations and 290 oral presentations in International Scientific meetings, from which 190 as invited speaker. He operated as invited surgeon and instructor in many different countries in Central Europe and Asia.",
            ],
        ]);


    }
}
