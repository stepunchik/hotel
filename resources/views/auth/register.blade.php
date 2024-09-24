@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('title', 'Регистрация')

@section('content')
    <div class="form-container">    
		<h1 class="auth-title">Регистрация</h1>
        <form class="form" action="{{ route('register') }}" method="post">
            @csrf
			
			<input class="field @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Введите имя" value="{{ old('name') }}">
			@error('name')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<input class="field @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Введите email" value="{{ old('email') }}">
			@error('email')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<input class="field @error('login') is-invalid @enderror" type="text" name="login" id="login" placeholder="Введите логин" value="{{ old('login') }}">
			@error('login')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<input class="field @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Введите пароль">
			@error('password')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<input class="field" type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль">
			
            <button class="button" type="submit">Зарегистрироваться</button>
			
            <p class="redirect">Уже есть аккаунт?<a href="{{ url('/auth/login') }}" class="redirect-link">Войти</a></p>
        </form>
    </div>
@endsection