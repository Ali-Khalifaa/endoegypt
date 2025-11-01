<?php

namespace App\Http\Resources\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClubMatchResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "stadium"  => $this->current_translation?->title,
            "match_link"  => $this->match_link,
            "match_date"  => $this->match_date,
            "club1"  => $this->club1?->current_translation?->title,
            "club1_image"  => $this->club1?->image,
            "club2"  => $this->club2?->current_translation?->title,
            "club2_image"  => $this->club2?->image,
            "champion"  => $this->champion?->current_translation?->title,
            "champion_image"  => $this->champion?->image,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
