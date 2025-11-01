<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use HasFactory,SoftDeletes , TranslationsTrait,SearchFilterTrait;
    
    protected $fillable = [
        'name',
        'city',
        'postal_code',
        'country_id',
        'status',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
