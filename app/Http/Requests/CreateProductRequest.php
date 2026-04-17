<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:20',
            'quantity' => 'required|numeric|min:1|max:199',
            'type' => 'required|in:ingredient,finished',
            'unit' => 'required|in:liter,kg,piece',
            'minimum' => 'required|numeric|min:1|max:199',
        ];
    }
}
