<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ChampionAward extends Model
{
    use HasFactory,TranslationsTrait,SoftDeletes,SearchFilterTrait;
    protected $guarded = ['id'];

    protected $table = "champion_awards";

    public function getImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }

    public function matches()
    {
        return $this->hasMany(ClubMatch::class, 'champion_award_id');
    }


    public function results()
    {
        return $this->hasManyThrough(Result::class, ClubMatch::class, 'champion_award_id', 'club_match_id', 'id', 'id')
                    ->whereNotNull('results.id');
    }

    public function clubs()
    {
        return ClubTeam::join('club_matches as cm1', 'club_teams.id', '=', 'cm1.club1_id')
            ->join('club_matches as cm2', 'club_teams.id', '=', 'cm2.club2_id')
            ->where('cm1.champion_award_id', $this->id)
            ->orWhere('cm2.champion_award_id', $this->id)
            ->select('club_teams.*')
            ->distinct()
            ->get()
            ->sortByDesc(function ($club) {
                return $club->getPoints($this->id);
            })->values();
    }

}
