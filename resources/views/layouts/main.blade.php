<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    @yield('styles')
	@yield('scripts')
    <title>@yield('title', 'Частный отель')</title>
</head>
<body>
	<div class="wrapper">
		<header class="header">
			<nav class="navigation-container">
				<div class="menu">
					<input class="burger-checkbox" type="checkbox" name="menu" id="btn-menu"/>
					<label class="burger" for="btn-menu"></label>
					<div class="side-navigation">
						<a class="link" href="{{ route('home.index') }}">Главная</a>
						<a class="link" href="{{ route('about.index') }}">Об отеле</a>
						<a class="link" href="{{ route('room-categories.index') }}">Номера</a>
						<a class="link" href="{{ route('dish-categories.index') }}">Питание</a>
						<a class="link" href="{{ route('conference-service.index') }}">Конференц-сервис</a>
						<a class="link" href="{{ route('offers.index') }}">Спецпредложения</a>
					</div>
				</div>
				<div class="navigation">
					<a class="link" href="{{ route('home.index') }}">Главная</a>
					<a class="link" href="{{ route('about.index') }}">Об отеле</a>
					<a class="link" href="{{ route('room-categories.index') }}">Номера</a>
					<a class="link" href="{{ route('dish-categories.index') }}">Питание</a>
				</div>
				<div class="navigation">
					<a class="link" href="{{ route('conference-service.index') }}">Конференц-сервис</a>
					<a class="link" href="{{ route('offers.index') }}">Спецпредложения</a>
					
				</div>
				<div class="auth">
					@auth
						<a class="button" href="{{ route('logout') }}" class="">Выйти</a>
						@if(Auth::user()->hasRole('admin'))
							<a class="button" href="{{ route('admin.main.index') }}">Админ панель</a>
						@endif
					@else
						<a class="button" href="{{ url('auth/login') }}" class="">Войти</a>
						<a class="button" href="{{ url('auth/register') }}" class="">Регистрация</a>
					@endauth
				</div>
            </nav>				
		</header>
		<main class="main">
			@yield('content')
		</main>
		<footer class="footer">
			<div>© 2020-2024 Компания Эко-отель.</div>
			<div class="social-media-container">
			<a href="https://web.telegram.org/	">
				<img class="social-media-link" src="{{ asset('img/telegram-icon.png') }}" alt="">
			</a>
			<a href="https://vk.com/">
				<img class="social-media-link" src="{{ asset('img/vk-icon.png') }}" alt="">
			</a>
			<a href="https://twitter.com/?lang=ru">
				<img class="social-media-link" src="{{ asset('img/twitter-icon.png') }}" alt="">
			</a>
		</footer>
	</div>
	@yield('swiper')
</body>
</html>