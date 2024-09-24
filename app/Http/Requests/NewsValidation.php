<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string|min:20',
			'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок новости.',
            'title.string' => 'Заголовок новости не может содержать только цифры.',
            'title.min' => 'Заголовок новости не может быть менее 3 символов.',
            'title.max' => 'Заголовок новости не может быть больше 255 символов.',
    
            'text.required' => 'Текст новости должен быть заполнен.',
            'text.string' => 'Текст новости не может содержать только цифры.',
            'text.min' => 'Текст новости должен содержать хотя бы 20 символов.',
			
			'image.required' => 'Выберите изображение.',
            'image.image' => 'Выбранный файл не является изображением.',
        ];
    }
}
