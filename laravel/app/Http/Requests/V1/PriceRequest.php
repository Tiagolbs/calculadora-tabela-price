<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'financed_amount' => 'required|numeric',
            'number_of_months' => 'required|integer|max:100',
            'interest_rate' => 'required|numeric|max:0.05',
            'initial_payment' => 'nullable|numeric'
        ];
    }
}
