<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class LatestVideoResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "video_url" => $this->video_url,
            "image" => $this->image.'',
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
