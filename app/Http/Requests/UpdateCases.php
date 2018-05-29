<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCases extends FormRequest
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
            'patient' => 'nullable|integer|min:1|exists:patients,id',
            'doctors' => 'required|array|min:1|max:5',
            'title' => 'required|string|min:2|max:191',
            'symptoms' => 'nullable|string|min:2',
            'treatment' => 'nullable|string|min:2',
            'medicine' => 'nullable|string|min:2',
            'is_consultation' => 'nullable|boolean',
            'is_emergency' => 'nullable|boolean',
            'is_delivery' => 'nullable|boolean',
            'is_success' => 'nullable|boolean',
            'discharged_on' => 'nullable|date_format:Y-m-d',
        ];
    }
}
