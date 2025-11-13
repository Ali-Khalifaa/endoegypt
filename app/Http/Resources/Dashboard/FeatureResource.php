<?php

namespace App\Http\Resources\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "title"       => $this->current_translation?->title,
            "image" => $this->image.'',
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
