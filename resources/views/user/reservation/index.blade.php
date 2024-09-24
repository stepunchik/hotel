@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/rooms.css') }}">
	<style>
		.reservation-container {
			display: flex;
			flex-direction: column;
			gap: 50px;
			border: 1px solid black;
			border-radius: 20px;
			padding: 20px;
		}
	</style>
@endsection

@section('title', 'Бронирование')

@section('content')
	<div class="container">
		@forelse($reservations as $reservation)
			<div class="reservation-container">
				<div class="dates">{{ $reservation['check_in'] }} - {{ $reservation['check_out'] }}</div>
				@foreach($reservation->rooms as $room)
					<div class="room-container">
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
							<div class="name">{{ $room['name'] }}</div>
							<p class="description">
								{{ $room['description'] }}
							</p>
							<div>{{ $room['price'] }} руб. за ночь</div>
							<a href="{{ route('rooms.show', $room['id']) }}">Подробнее</a>
						</div>
					</div>
				@endforeach
				<form action="{{ route('reservations.destroy', $reservation) }}" method="POST">
					@csrf
					@method('DELETE')
					
					<button class="secondary-button button-size">Отменить</button>
				</form>
			</div>
		@empty
			<p>Броней пока нет.</p>
		@endforelse
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
