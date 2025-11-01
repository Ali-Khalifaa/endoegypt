<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClubMatch extends Model
{
    use HasFactory,SoftDeletes , TranslationsTrait ,SearchFilterTrait;
    protected $fillable = [
        'club1_id',
        'club2_id',
        'match_link',
        'match_date',
        'champion_award_id',
    ];

    protected $casts = [
        'match_date' => 'datetime',
    ];

    public function club1()
    {
        return $this->belongsTo(ClubTeam::class, 'club1_id');
    }

    public function club2()
    {
        return $this->belongsTo(ClubTeam::class, 'club2_id');
    }

    public function result()
    {
        return $this->hasOne(Result::class, 'club_match_id');
    }

    public function champion()
    {
        return $this->belongsTo(ChampionAward::class, 'champion_award_id');
    }
}
