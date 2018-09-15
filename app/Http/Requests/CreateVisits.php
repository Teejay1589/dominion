<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVisits extends FormRequest
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
            'patient' => 'required|integer|min:1|exists:patients,id',
            'doctors' => 'nullable|array|min:0|max:5',
            'title' => 'required|string|min:2|max:191',
            'subjects' => 'nullable|string|min:2',
            'objects' => 'nullable|string|min:2',
            'assessment' => 'nullable|string|min:2',
            'plans' => 'nullable|string|min:2',
            'summary' => 'nullable|string|min:2',
            // 'successful_delivery' => 'nullable|boolean',
            // 'discharged_on' => 'nullable|date_format:Y-m-d'
        ];
    }
}
