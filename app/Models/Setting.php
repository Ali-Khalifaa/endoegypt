<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory,TranslationsTrait,SearchFilterTrait;

    protected $guarded = ['id'];

    protected $table = "settings";

    public function getBreadcrumbImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }
    public function getHeaderImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }
    public function getFooterImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }

}
