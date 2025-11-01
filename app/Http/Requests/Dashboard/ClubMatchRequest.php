<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ClubMatchRequest extends FormRequest
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
            "translations.*.title" => "required|string",
            "club1_id" => "required|exists:club_teams,id",
            "club2_id" => "required|exists:club_teams,id|different:club1_id",
            "match_link" => "required|url",
            "champion_award_id" => "required|exists:champion_awards,id",
            "match_date" => "required",
        ];
    }
}
