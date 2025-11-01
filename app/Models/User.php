<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory,SoftDeletes , TranslationsTrait,SearchFilterTrait;

    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'password',
    ];

    public function getOutfitImageAttribute(): string
    {
        $image = $this->shirt_type.'_'.$this->shirt_color.'_'.$this->secondary_color.'_'.$this->trousers_color.'.png';
        return asset('images/outfitColors/'.$image);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function ageCategory()
    {
        return $this->belongsTo(AgeCategory::class);
    }

    public function outfitColor()
    {
        return $this->belongsTo(OutfitColor::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
