<?php

namespace App\Http\Resources\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OutfitColorResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"  => $this->id,
            "shirt_color"  => $this->shirtColor,
            "secondary_color"  => $this->secondaryColor,
            "trousers_color"  => $this->trousersColor,
           "shirt_type"=> [
                "name" => $this->shirt_type->name,
                "value" => $this->shirt_type->value,
                "label" => $this->shirt_type->label(),
            ],
            "image" => $this->image.'',
            "status" => $this->status,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
