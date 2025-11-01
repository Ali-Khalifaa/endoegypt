<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ClubTeam extends Model
{
    use HasFactory,SoftDeletes,TranslationsTrait,SearchFilterTrait;

    protected $guarded = ['id'];

    protected $table = "club_teams";

    public function getImageAttribute($value): string
    {
        return asset('upload/general/'.$value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matches()
    {
        return $this->hasMany(ClubMatch::class, 'club1_id')->orWhere('club2_id', $this->id);
    }

    public function results($championId)
    {
        return $this->hasManyThrough(Result::class, ClubMatch::class, 'club1_id', 'club_match_id', 'id', 'id')->where('club_matches.champion_award_id',$championId)
            ->orWhere(function($q) use($championId){
                $q->where('club_matches.club2_id', $this->id)->where('club_matches.champion_award_id',$championId);
            });
    }

    public function winingMatches($championId)
    {
        return DB::table('results')->join('club_matches', 'results.club_match_id', '=', 'club_matches.id')
        ->where('club_matches.champion_award_id',$championId)
            ->where(function($query) {
                $query->where(function($query) {
                    $query->where('club_matches.club1_id', $this->id)
                        ->whereColumn('results.club1_result', '>', 'results.club2_result');
                })
                ->orWhere(function($query) {
                    $query->where('club_matches.club2_id', $this->id)
                        ->whereColumn('results.club2_result', '>', 'results.club1_result');
                });
            })->get();
    }

    public function loosingMatches($championId)
    {
       return  DB::table('results')->join('club_matches', 'results.club_match_id', '=', 'club_matches.id')
        ->where('club_matches.champion_award_id',$championId)
        ->where(function($query) {
                $query ->where(function($query) {
                    $query->where('club_matches.club1_id', $this->id)
                    ->whereColumn('results.club1_result', '<', 'results.club2_result');
                })
                ->orWhere(function($query) {
                    $query->where('club_matches.club2_id', $this->id)
                        ->whereColumn('results.club2_result', '<', 'results.club1_result');
                });
        })->get();
    }

    public function drawMatches($championId)
    {
        return DB::table('results')
        ->join('club_matches', 'results.club_match_id', 'club_matches.id')
        ->where('club_matches.champion_award_id',$championId)
        ->where(function($query) {
            $query->where(function($query) {
                $query->where('club_matches.club1_id', $this->id)
                ->whereColumn('results.club1_result', '=', 'results.club2_result');
            })
            ->orWhere(function($query) {
                $query->where('club_matches.club2_id', $this->id)
                    ->whereColumn('results.club2_result', '=', 'results.club1_result');
            });
        })->get();
    }

    //calc points
    public function getPoints($championId)
    {
        return ($this->winingMatches($championId)->count() * 3) +( $this->drawMatches($championId)->count());
    }




}
