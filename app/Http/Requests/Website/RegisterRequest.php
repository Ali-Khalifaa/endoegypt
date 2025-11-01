<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'manager_name' => 'required|string|min:3|max:50',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'country_id' => 'required|exists:countries,id',
            'learn_about_id' => 'required|exists:learn_abouts,id',
            'password' => 'required|min:8|max:50',
            'confirmation' => 'required|same:password',
          
        ];
    }
}
