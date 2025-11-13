<?php

namespace App\Exports;

use App\Models\EventRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;

class EventRegistrationExport implements FromCollection
{
    protected $data;

    // استقبل البيانات في الكونسـتراكتور
    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function collection()
    {
        // لو فيه بيانات مفلترة استخدمها، غير كده رجّع الكل
        return $this->data ?? EventRegistration::all();
    }

}
