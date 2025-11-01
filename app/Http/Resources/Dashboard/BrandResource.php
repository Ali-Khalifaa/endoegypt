<?php

namespace App\Http\Resources\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "image" => $this->image.'',
            "link_url" => $this->link_url,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
