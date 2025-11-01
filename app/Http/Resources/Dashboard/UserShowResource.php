<?php

namespace App\Http\Resources\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'manager_name'    => $this->manager_name,
            'street_and_number'=> $this->street_and_number,
            'postal_code'      => $this->postal_code,
            'city'             => $this->city,
            'shirt_type'       => $this->shirt_type,
            'shirt_color'      => $this->shirt_color,
            'secondary_color'  => $this->secondary_color,
            'trousers_color'   => $this->trousers_color,
            'phone'            => $this->phone,
            'preferred_room_type'=> $this->preferred_room_type,
            'preferred_hotel'  => $this->preferred_hotel,
            'email'           => $this->email ,
            'club'           => $this->club,
            'age_category'  => $this->ageCategory?->current_translation?->title,
            'country'       => $this->country?->current_translation?->title,
            'area'          => $this->area?->current_translation?->title,
            'category'      => $this->category?->current_translation?->title,
            'status'           => $this->status,
            'is_approved'      => $this->is_approved,
            'number_of_persons'=> $this->number_of_persons,
            'outfit_image'=> $this->outfit_image,
            "created_at"       => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
