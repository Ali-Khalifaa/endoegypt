<?php

namespace App\Http\Requests\Dashboard;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            "translations"         => "nullable|array",
            "translations.*.title" => "nullable|string",
            "translations.*.description" => "nullable|string",
            "date" => "nullable",
            "status" =>  "nullable|boolean",
            "is_image" =>  "nullable|boolean",
            'image' => $this->method() == 'PUT'
                ? 'nullable'.($this->hasFile('image') ? '|file|mimes:jpeg,jpg,png,svg,webp,mp4,mov,avi,mpeg,webm' : '')
                : 'required|file|mimes:png,svg,webp,jpg,jpeg,mp4,mov,avi,mpeg,webm',
        ];
    }
}
