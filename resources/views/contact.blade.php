@extends('layouts.main')

@push('styles-and-sripts')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <script src="{{ asset('js/calendar.js') }}"></script>
@endpush

@section('title', 'Контакт')

@section('content')
    <div class="contact-form">
        <p class="description">Данная страница позволяет отправить сообщение на мой персональный почтовый ящик.</p>

        <form action="{{ route('contact.store')}}" id="contact-form" method="post">
            @csrf

            <p>Ваше ФИО: <input type="text" id="name" name="name" value="{{ session('success') ? '' : old('name') }}"></p>
            @error('name')
                <div class="invalid-input-message">{{ $message }}</div>
            @enderror

            <p>Ваш пол:</p>
            <input type="radio" name="sex" value="male" {{ old('sex') === 'male' ? 'checked' : '' }}>
            <label for="male">Мужской</label>
            <br>
            <input type="radio" name="sex" value="female" {{ old('sex') === 'female' ? 'checked' : '' }}>
            <label for="female">Женский</label>
            @error('sex')
                <div class="invalid-input-message">{{ $message }}</div>
            @enderror
            
            <div class="birth-date-field">
                Дата рождения:
                <input type="text" name="birth_date" id="birth-date-input" maxlength="10" placeholder="ДД.ММ.ГГГГ" value="{{ session('success') ? '' : old('birth_date') }}">
                <img src="img/calendar-icon.png" alt="calendar icon" id="calendar-button">
                <div class="calendar" id="calendar">
                    <select name="select-month" id="select-month">
                        <option value="1" selected>Январь</option>
                        <option value="2">Февраль</option>
                        <option value="3">Март</option>
                        <option value="4">Апрель</option>
                        <option value="5">Май</option>
                        <option value="6">Июнь</option>
                        <option value="7">Июль</option>
                        <option value="8">Август</option>
                        <option value="9">Сентябрь</option>
                        <option value="10">Октябрь</option>
                        <option value="11">Ноябрь</option>
                        <option value="12">Декабрь</option>
                    </select>
                    <select name="select-year" id="select-year">
                        <option value="2024" selected>2024</option>
                    </select>
                    <div class="calendar-body" id="calendar-body">                            
                    </div>
                </div>
            </div>
            @error('birth_date')
                <div class="invalid-input-message">{{ $message }}</div>
            @enderror

            <p>Ваш E-mail: <input type="email" id="email" name="email" placeholder="example@example.com" value="{{ session('success') ? '' : old('email') }}"></p>
            @error('email')
                <div class="invalid-input-message">{{ $message }}</div>
            @enderror

            <p>Ваш номер телефона: <input type="tel" id="tel-number" name="phone_number" value="{{ session('success') ? '' : old('phone_number') }}"></p>
            @error('phone_number')
                <div class="invalid-input-message">{{ $message }}</div>
            @enderror

            <textarea name="message" id="message" cols="115" rows="5" placeholder="Ваше сообщение">{{ session('success') ? '' : old('message') }}</textarea>
            @error('message')
                <div class="invalid-input-message">{{ $message }}</div>
            @enderror

            <br>
            <button class="button" type="submit">Отправить</button>
            <button class="button" type="reset">Очистить</button>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    </div>		
@endsection