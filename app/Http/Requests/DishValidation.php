<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'ingredients' => 'required|string|min:20',
			'image' => 'required|image',
			'price' => 'required|integer',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название блюда.',
            'name.string' => 'Название блюда не может содержать только цифры.',
            'name.min' => 'Название блюда не может быть менее 3 символов.',
            'name.max' => 'Название блюда не может быть больше 255 символов.',
    
            'ingredients.required' => 'Ингредиенты должны быть заполнены.',
            'ingredients.string' => 'Ингредиенты не могут содержать только цифры.',
            'ingredients.min' => 'Ингредиенты должны содержать хотя бы 20 символов.',
			
			'image.required' => 'Выберите изображение.',
            'image.image' => 'Выбранный файл не является изображением.',
			
			'price.required' => 'Введите цену.',
            'price.integer' => 'Цена должна быть целочисленной.',
			
			'category_id.required' => 'Выберите категорию.',
        ];
    }
}
