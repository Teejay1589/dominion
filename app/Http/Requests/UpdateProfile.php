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
            // 'avatar' => 'nullable|file|image|max:1024',
            // 'username' => 'required|string|min:4|max:25',
            'name' => 'required|string|min:2|max:191',
            'email' => 'required|email|max:191',
            // 'gender' => 'required|string|min:4|max:6',

            // 'role' => 'nullable|integer|min:1|exists:roles,id',
        ];
    }
}
