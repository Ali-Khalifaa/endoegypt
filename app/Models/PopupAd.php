<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopupAd extends Model
{
    use HasFactory , TranslationsTrait,SearchFilterTrait;

    protected $guarded = ['id'];

    protected $table = "popup_ads";

    public function getImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }
}
