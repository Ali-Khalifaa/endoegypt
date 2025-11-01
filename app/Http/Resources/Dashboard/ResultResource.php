<?php

namespace App\Http\Resources\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "club_match_id"  => $this->club_match_id,
            "club1_result"  => $this->club1_result,
            "club2_result"  => $this->club2_result,
            "stadium"  =>  $this->clubMatch?->current_translation?->title,
            "club1"  => $this->clubMatch?->club1?->current_translation?->title,
            "club1_image"  => $this->clubMatch?->club1?->image,
            "club2"  => $this->clubMatch?->club2?->current_translation?->title,
            "club2_image"  => $this->clubMatch?->club2?->image,
            "champion_award_id"  => $this->clubMatch?->champion_award_id,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
