<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillings extends FormRequest
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
            'billing_name' => 'required|string|min:2|max:191',
            'amount' => 'required|numeric',
            'is_paid' => 'nullable|boolean',
        ];
    }
}
