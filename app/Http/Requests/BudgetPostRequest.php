<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
	{
        return [
			'name_short' => ['required', 'string', 'max:64'],
			'name' => ['required', 'string', 'max:128'],
			'type_id' => ['nullable', 'sometimes', 'exists:types,id']
        ];
    }
}
