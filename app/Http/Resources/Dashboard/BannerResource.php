<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BannerResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title"       => $this->current_translation?->title,
            "description" => $this->current_translation?->description,
            "image" => $this->image.'',
            "position" => $this->position,
            "status" => $this->status,
            "date" => Carbon::createFromFormat('Y-m-d H:i:s', $this->date)->format('Y-m-d  (H:i)'),
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
