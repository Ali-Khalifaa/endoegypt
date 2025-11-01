<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OutfitColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "shirt_color_id" => "required|exists:colors,id",
            "secondary_color_id" => "required|exists:colors,id",
            "trousers_color_id" => "required|exists:colors,id",
            "shirt_type" => "required",
            "status" =>  "required|boolean",
            'image' => $this->method() == 'PUT' ? 'nullable'.($this->hasFile('image')?'|file|mimes:jpeg,jpg,png,svg,webp':'') : 'required|file|mimes:png,svg,webp,jpg,jpeg' ,
        ];
    }
}
