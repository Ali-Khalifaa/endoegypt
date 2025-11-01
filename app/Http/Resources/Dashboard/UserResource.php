<?php

namespace App\Http\Resources\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'club_id'          => $this->club_id,
            'age_category_id'  => $this->age_category_id,
            'country_id'       => $this->country_id,
            'area_id'          => $this->area_id,
            'category_id'      => $this->category_id,
            'learn_about_id'   => $this->learn_about_id,
            'status'           => $this->status,
            'is_approved'      => $this->is_approved,
            'number_of_persons'=> $this->number_of_persons,
            "created_at"       => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d  (H:i)'),
        ];
    }
}
