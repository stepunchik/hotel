@extends('layouts.main')

@push('styles-and-sripts')
    <link rel="stylesheet" href="{{ asset('css/guestbook.css') }}">
@endpush

@section('title', 'Гостевая книга')

@section('content')
    <div class="form-container">      
        <form class="form" action="{{ route('guestbook.store') }}" method="post">
            @csrf
            <div class="field-group">
                <label class="field-label" for="surname">Фамилия:</label>
                <input class="field" type="text" name="surname" id="surname" value="{{ old('surname') }}">
            </div>
			@error('surname')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
            <div class="field-group">
                <label class="field-label" for="name">Имя:</label>
                <input class="field" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
			@error('name')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
            <div class="field-group">
                <label class="field-label" for="patronymic">Отчество:</label>
                <input class="field" type="text" name="patronymic" id="patronymic" value="{{ old('patronymic') }}">
            </div>
			@error('patronymic')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
            <div class="field-group">                   
                <label class="field-label" for="email">Электронная почта:</label>
                <input class="field" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
			@error('email')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
            <div class="field-group">
                <label class="field-label" for="message-text">Текст отзыва:</label>
                <textarea class="field" name="text" id="message-text">{{ old('text') }}</textarea>
            </div>
			@error('text')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
            <div class="button-container">
                <button class="button" type="submit">Опубликовать</button>
            </div>
        </form>
    </div>
    <div class="messages">
		@foreach($messages as $message)
			<div class="message-container">
				<div>
					<div class="name">{{ $message['name'] }}</div>
					<div class="email">{{ $message['email'] }}</div>
					<div class="created-date">{{ $message['created_at'] }}</div>
				</div>
				<p class="message-text">{{ $message['text'] }}</p>
			</div>
		@endforeach
    </div>
@endsection
