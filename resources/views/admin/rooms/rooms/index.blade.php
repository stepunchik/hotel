@extends('layouts.admin')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    <style type="text/css">
    	.image {
    		width: 100%;
			height: 100%;
			object-fit: cover;
    	}
    </style>
@endsection

@section('title', 'Номера')

@section('content')
	<h1 class="title">Номера</h1>
	<div class="buttons-container">
		@if(!$roomCategories->isEmpty())
			<a class="button button-size" href="{{ route('admin.rooms.create') }}">+ Добавить номер</a>
		@endif
		<a class="button button-size" href="{{ route('admin.room-categories.create') }}">+ Добавить категорию номеров</a>
	</div>
	<div class="container">
		@foreach($rooms as $room)		
			<div class="item-container">
				<div>
					<div class="swiper">
						<div class="swiper-wrapper">
							@foreach($room->photos as $photo)
								<div class="swiper-slide">
									<img class="image" src="{{ asset('/storage/' . $photo['image']) }}" alt="{{ $room['name'] }}">
								</div>
							@endforeach
						</div>
						
						<div class="swiper-pagination"></div>
					</div>
					<div class="created-date">Дата создания: {{ $room['created_at'] }}</div>
					<div class="created-date">Последнее обновление: {{ $room['updated_at'] }}</div>
				</div>
				<div class="inner-container">
					<div class="item-title">Название: {{ $room['name'] }}</div>
					<p class="text">Описание: {{ $room['description'] }}</p>
					<div class="text">Количество спальных мест: {{ $room['beds_num'] }}</div>
					<div class="text">Цена: {{ $room['price'] }}</div>
					<div class="text">Категория: {{ $room->category->name }}</div>
					<form action="{{ route('admin.rooms.destroy', $room['id']) }}" method="POST">
						@csrf
						@method('DELETE')
						
						<button class="secondary-button button-size">Удалить</button>
						<a class="button button-size" href="{{ route('admin.rooms.edit', $room['id']) }}">Редактировать</a>
					</form>
				</div>
			</div>
		@endforeach
	</div>
@endsection

@section('swiper')
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script>
		const swiper = new Swiper('.swiper', {
			slidesPerView: 1,
			spaceBetween: 0,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
		});
	</script>
@endsection
