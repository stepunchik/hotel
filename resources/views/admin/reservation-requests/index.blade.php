@extends('layouts.admin')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/rooms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
	<style>
		.reservation-container {
			display: flex;
			flex-direction: column;
			gap: 50px;
			border: 1px solid black;
			border-radius: 20px;
			padding: 20px;
		}

		.main {
			margin-top: 0;
		}
	</style>
@endsection

@section('title', 'Запросы на бронирование')

@section('content')
	<h1>Запросы на бронирование</h1>
	<div class="container">
		@forelse($reservations as $reservation)
			<div class="reservation-container">
				<div>Имя пользователя: {{ $reservation['name'] }}</div>
				<div>E-mail: {{ $reservation['email'] }}</div>
				<div>Номер телефона: {{ $reservation['phone_number'] }}</div>
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
				@if($reservation['confirmed'])
					<div class="message-text">Подтверждено</div>
				@else
					<div class="message-text">На рассмотрении</div>
				@endif
				<div class="forms-container">
					<form action="{{ route('admin.reservation-requests.destroy', $reservation) }}" method="POST">
						@csrf
						@method('DELETE')
						
						<button class="secondary-button button-size">Отменить</button>
					</form>
					@if(!$reservation['confirmed'])
						<form action="{{ route('admin.reservation-requests.confirm', $reservation) }}" method="POST">
							@csrf
							@method('PUT')
							
							<button class="button button-size">Подтвердить</button>
						</form>
					@endif
				</div>
				
			</div>
		@empty
			<p>Броней пока нет.</p>
		@endforelse
		<div>
			{{ $reservations->links() }}
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
