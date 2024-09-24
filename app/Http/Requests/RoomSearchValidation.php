<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomSearchValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
			'check_in' => 'required|date',
			'check_out' => 'required|date',
        ];
    }

    public function messages()
    {
        return [    
            'check_in.required' => 'Введите дату заезда.',
            'check_in.date' => 'Неверный формат даты заезда.',
			
			'check_out.required' => 'Введите дату выезда.',
            'check_out.date' => 'Неверный формат даты выезда.',
        ];
    }
}
