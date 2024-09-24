<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'text' => 'required|string|min:20',
			'rating' => 'required|integer|min:1|max:5',
        ];
    }

    public function messages()
    {
        return [    
            'text.required' => 'Текст отзыва должен быть заполнено.',
            'text.string' => 'Текст отзыва не может содержать только цифры.',
            'text.min' => 'Текст отзыва должен содержать хотя бы 20 символов.',
			
			'rating.required' => 'Введите рейтинг.',
            'rating.integer' => 'Рейтинг должен быть целочисленным.',
        ];
    }
}
