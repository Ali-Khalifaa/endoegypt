<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use HasFactory , TranslationsTrait,SoftDeletes,SearchFilterTrait;

    protected $table = 'events';

    protected $guarded = ['id'];

    public function getImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }

    public function getBrochureAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }
    

    public function details()
    {
        return $this->hasOne(EventDetail::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
