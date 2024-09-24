<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceEditValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|min:3|max:255',
			'image' => 'sometimes|image',
            'description' => 'sometimes|string|min:20',
        ];
    }
}
