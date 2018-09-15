<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatients extends FormRequest
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
            'sex' => 'required|string|min:4|max:12',
            'email' => 'nullable|email|max:191',
            'phone_number' => 'required|string|min:8|max:16',
            'next_of_kin' => 'nullable|string|min:2|max:191',
            'next_of_kin_telephone' => 'nullable|string|min:8|max:16',
            'blood_group' => 'nullable|string|min:1|max:3',
            'weight' => 'nullable|string',
            'height' => 'nullable|string',
        ];
    }
}
