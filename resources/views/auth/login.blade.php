@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('title', 'Вход')

@section('content')
    <div class="form-container">
    	<h1 class="auth-title">Вход</h1>     
        <form class="form" action="{{ route('login') }}" method="post">
            @csrf
			
			<input class="field" type="text" name="login" placeholder="Введите логин" value="{{ old('login') }}">
			<input class="field" type="password" name="password" placeholder="Введите пароль">
            
			@if($errors->any())
				<div class="invalid-input-message">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			
            <button class="button" type="submit">Войти</button>
			
			<p class="redirect">Еще нет аккаунта?<a href="{{ url('/auth/register') }}" class="redirect-link">Зарегистрироваться</a></p>
        </form>
    </div>
@endsection