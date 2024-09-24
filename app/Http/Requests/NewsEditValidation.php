<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsEditValidation extends NewsValidation
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|min:3|max:255',
            'text' => 'sometimes|string|min:20',
			'image' => 'sometimes|image',
        ];
    }
}
