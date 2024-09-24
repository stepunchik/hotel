<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
			'image' => 'required|image',
            'description' => 'required|string|min:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название услуги.',
            'name.string' => 'Название услуги не может содержать только цифры.',
            'name.min' => 'Название услуги не может быть менее 3 символов.',
            'name.max' => 'Название услуги не может быть больше 255 символов.',
    
			'image.required' => 'Выберите изображение.',
            'image.image' => 'Выбранный файл не является изображением.',
	
            'description.required' => 'Описание услуги должно быть заполнено.',
            'description.string' => 'Описание услуги не может содержать только цифры.',
            'description.min' => 'Описание услуги должно содержать хотя бы 20 символов.',
        ];
    }
}
