<?php

namespace App\Models;

use App\Enums\ShirtTypeEnum;
use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutfitColor extends Model
{
    use HasFactory,SoftDeletes , TranslationsTrait,SearchFilterTrait;

    protected $fillable = [
        'shirt_type',
        'shirt_color_id',
        'secondary_color_id',
        'trousers_color_id',
        'image',
        'status',
    ];

    protected $casts = [
        'shirt_type' => ShirtTypeEnum::class ,
    ];

    public function getImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }

    public function shirtColor()
    {
        return $this->belongsTo(Color::class, 'shirt_color_id');
    }

    public function secondaryColor()
    {
        return $this->belongsTo(Color::class, 'secondary_color_id');
    }

    public function trousersColor()
    {
        return $this->belongsTo(Color::class, 'trousers_color_id');
    }
}
