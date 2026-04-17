<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateActionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string',
            'reason' => 'required|in:error|old|crashed',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id|distinct',
            'products.*.quantity' => 'required|integer|min:1|max:9999',
        ];
    }
}
