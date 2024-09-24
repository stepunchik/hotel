@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<link rel="stylesheet" href="{{ asset('css/show.css') }}">
	<style type="text/css">
		.title {
			font-size: 3rem;
		}

		.image {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	</style>
@endsection

@section('title')
	{{ $room['title'] }}
@endsection

@section('content')
	<div class="back-button-container">
		<a class="back-button" href="{{ url()->previous() }}"><- Назад</a>
	</div>
	<div class="container">
		<div class="title-container">
			<div class="title">{{ $room['name'] }}</div>
		</div>
		<div class="item-container">
			<div class="image-container">
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
			</div>
			<div class="inner-container">
				<div>
					<p class="text">Количество спальных мест: {{ $room['beds_num'] }}</p>
					<p class="text">Описание: {{ $room['description'] }}</p>
				</div>
				<div class="cost">Цена: {{ $room['price'] }} руб. за ночь</div>
			</div>		
		</div>
		
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