<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->method() == 'PUT' ? last($this->segments()) : null;
        return [
            "translations"         => "nullable|array",
            "translations.*.title" => "required|string",
            "translations.*.description" => "required|string",
            'breadcrumb_image' => $this->method() == 'PUT' ? 'nullable'.($this->hasFile('breadcrumb_image')?'|file|mimes:jpeg,jpg,png,svg,webp':'') : 'required|file|mimes:png,svg,webp,jpg,jpeg' ,
            'header_image' => $this->method() == 'PUT' ? 'nullable'.($this->hasFile('header_image')?'|file|mimes:jpeg,jpg,png,svg,webp':'') : 'required|file|mimes:png,svg,webp,jpg,jpeg' ,
            'footer_image' => $this->method() == 'PUT' ? 'nullable'.($this->hasFile('footer_image')?'|file|mimes:jpeg,jpg,png,svg,webp':'') : 'required|file|mimes:png,svg,webp,jpg,jpeg' ,
        ];
    }
}
