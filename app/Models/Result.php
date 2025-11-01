<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory,SoftDeletes,SearchFilterTrait;

    protected $guarded = ['id'];

    protected $table = "results";

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function clubMatch()
    {
        return $this->belongsTo(ClubMatch::class);
    }


}
