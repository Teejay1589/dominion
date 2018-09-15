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
            'visit' => 'required|integer|min:1|exists:visits,id',
            // 'doctors' => 'required|array|min:1|max:5',
            'surgery_name' => 'required|string|min:2|max:191',
            'surgery_date' => 'nullable|date_format:Y-m-d',
            'complications' => 'nullable|string|min:2',
        ];
    }
}
