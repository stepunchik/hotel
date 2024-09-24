<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название категории.',
            'name.string' => 'Название категории не может содержать только цифры.',
            'name.min' => 'Название категории не может быть менее 3 символов.',
            'name.max' => 'Название категории не может быть больше 255 символов.',
        ];
    }
}
