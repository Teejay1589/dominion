<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'first_name' => 'required|string|min:2|max:191',
            'last_name' => 'nullable|string|min:2|max:191',
            'email' => 'nullable|email|max:191',
            'sex' => 'required|string|min:4|max:12',
            // 'last_name' => 'required|string|min:2|max:191',
            // 'email' => 'required|email|max:191',
        ];
    }
}
