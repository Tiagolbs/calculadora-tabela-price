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
            'financed_amount' => 'required|numeric|gt:0',
            'number_of_months' => 'required|integer|max:100|gt:0',
            'interest_rate' => 'required|numeric|max:0.05|gt:0',
            'initial_payment' => 'nullable|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'interest_rate.max' => 'A taxa de juros máxima é de 5%.',
            'interest_rate.gt' => 'A taxa de juros deve ser maior do que 0.',
            'interest_rate.required' => 'A taxa de juros é obrigatória.',
            'number_of_months.max' => 'A quantidade máxima de meses é 100.',
            'number_of_months.gt' => 'A quantidade de meses deve ser maior do que 0.',
            'number_of_months.required' => 'A quantidade de meses é obrigatória.',
            'financed_amount.gt' => 'O valor do financiamento deve ser maior do que 0.',
            'financed_amount.required' => 'O valor do financiamento é obrigatório.'
        ];
    }
}
