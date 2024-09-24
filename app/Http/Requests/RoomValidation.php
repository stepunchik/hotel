<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:20',
			'images.*' => 'required|image',
			'beds_num' => 'required|integer',
			'price' => 'required|integer',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите название номера.',
            'name.string' => 'Название номера не может содержать только цифры.',
            'name.min' => 'Название номера не может быть менее 3 символов.',
            'name.max' => 'Название номера не может быть больше 255 символов.',
    
            'description.required' => 'Описание должно быть заполнено.',
            'description.string' => 'Описание не может содержать только цифры.',
            'description.min' => 'Описание должно содержать хотя бы 20 символов.',
			
			'beds_num.required' => 'Введите количество спальных мест.',
            'beds_num.integer' => 'Количество спальных мест должно быть целочисленным.',
			
			'image.required' => 'Выберите изображение.',
            'image.image' => 'Выбранный файл не является изображением.',
			
			'price.required' => 'Введите цену.',
            'price.integer' => 'Цена должна быть целочисленной.',
			
			'category_id.required' => 'Выберите категорию.',
        ];
    }
}
