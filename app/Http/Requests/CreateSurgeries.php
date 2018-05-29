<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSurgeries extends FormRequest
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
            'case' => 'required|integer|min:1|exists:cases,id',
            // 'doctors' => 'required|array|min:1|max:5',
            'name' => 'required|string|min:2|max:191',
            'started_at' => 'required|date_format:Y-m-d',
            'ended_at' => 'nullable|date_format:Y-m-d',
            'is_success' => 'nullable|boolean',
        ];
    }
}
