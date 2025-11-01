<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDetail extends Model
{
    use HasFactory , TranslationsTrait,SoftDeletes,SearchFilterTrait;

    protected $table = 'event_details';

    protected $guarded = ['id'];
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
