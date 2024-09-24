@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<link rel="stylesheet" href="{{ asset('css/rooms.css') }}"/>
@endsection

@section('title', 'Номера')

@section('content')
    <div class="container">
		@foreach($rooms as $room) 
			<div class="room-container">
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
				</div>
				<div class="inner-container">
					<div class="name">{{ $room['name'] }}</div>
					<p class="description">
						{{ $room['description'] }}
					</p>
					<div class="text">Цена за ночь: {{ $room['price'] }} руб.</div>
					<a href="{{ route('rooms.show', $room['id']) }}">Подробнее</a>
					<div class="link-container">
						<a class="button" href="{{ route('reservations.room-search') }}">Бронировать</a>
					</div>
				</div>
			</div>
		@endforeach
		<div>
			{{ $rooms->links() }}
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