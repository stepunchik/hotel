<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
			'images.*' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
			'image.required' => 'Выберите изображение.',
            'image.image' => 'Выбранный файл не является изображением.',
        ];
    }
}
