<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
			'email' => 'required|email',
            'phone_number' => 'required',
			'check_in' => 'required|date',
			'check_out' => 'required|date',
            'room_ids' => 'required|array|min:1',
            'room_ids.*' => 'exists:rooms,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите ФИО.',
            'name.string' => 'ФИО не может содержать только цифры.',
            'name.min' => 'ФИО не может быть менее 3 символов.',
            'name.max' => 'ФИО не может быть больше 255 символов.',
			
			'email.required' => 'Введите электронную почту.',
			'email.email' => 'Неверный формат электронной почты.',
            'email.unique' => 'На эту электронную почту уже есть бронь.',

            'phone_number.required' => 'Введите номер телефона.',
            'phone_number.regex' => 'Неверный формат номера телефона.',
    
            'check_in.required' => 'Введите дату заезда.',
            'check_in.date' => 'Неверный формат даты заезда.',
			
			'check_out.required' => 'Введите дату выезда.',
            'check_out.date' => 'Неверный формат даты выезда.',
        ];
    }
}
