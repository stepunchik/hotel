<!DOCTYPE html>
<html lang="ru">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="{{ asset('css/admin/admin-panel.css') }}">
	    @yield('styles')
		@yield('scripts')
	    <title>@yield('title', 'Админ панель')</title>
	</head>
	<body>
		<div class="menu">
			<input class="burger-checkbox" type="checkbox" name="menu" id="btn-menu"/>
			<label class="burger" for="btn-menu"></label>
			<div class="sidenav">
				<a href="{{ route('admin.news.index') }}">Новости</a>
				<a href="{{ route('admin.services.index') }}">Услуги</a>
				<a href="{{ route('admin.reviews.index') }}">Отзывы гостей</a>

				<a href="{{ route('admin.rooms.index') }}">Номера</a>
				<a href="{{ route('admin.room-categories.index') }}">Категории номеров</a>

				<a href="{{ route('admin.dishes.index') }}">Блюда</a>
				<a href="{{ route('admin.dish-categories.index') }}">Категории блюд</a>

				<a href="{{ route('admin.pages.index') }}">Страницы</a>
				<a href="{{ route('admin.photos.index') }}">Фото</a>
				<a href="{{ route('admin.reservation-requests.index') }}">Заявки на бронирование</a>
			</div>
		</div>
		<div class="sidenav-display">
			<a href="{{ route('admin.news.index') }}">Новости</a>
			<a href="{{ route('admin.services.index') }}">Услуги</a>
			<a href="{{ route('admin.reviews.index') }}">Отзывы гостей</a>

			<a href="{{ route('admin.rooms.index') }}">Номера</a>
			<a href="{{ route('admin.room-categories.index') }}">Категории номеров</a>

			<a href="{{ route('admin.dishes.index') }}">Блюда</a>
			<a href="{{ route('admin.dish-categories.index') }}">Категории блюд</a>
				
			<a href="{{ route('admin.pages.index') }}">Страницы</a>
			<a href="{{ route('admin.photos.index') }}">Фото</a>
			<a href="{{ route('admin.reservation-requests.index') }}">Заявки на бронирование</a>
		</div>
		<main class="main">
			@yield('content')	
		</main>
		@yield('swiper')
	</body>
</html>