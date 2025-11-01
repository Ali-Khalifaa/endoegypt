<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionshipGallery extends Model
{
    use HasFactory,SearchFilterTrait;

    protected $guarded = ['id'];

    protected $table = "championship_galleries";

    public function getImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }
}
