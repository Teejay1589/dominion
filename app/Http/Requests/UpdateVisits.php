<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisits extends FormRequest
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
            'doctors' => 'nullable|array|min:0|max:5',
            'title' => 'required|string|min:2|max:191',
            'diagnosis' => 'nullable|string|min:2',
            'complications' => 'nullable|string|min:2',
            'management' => 'nullable|string|min:2',
            'successful_delivery' => 'nullable|boolean',
            'discharged_on' => 'nullable|date_format:Y-m-d',
        ];
    }
}
