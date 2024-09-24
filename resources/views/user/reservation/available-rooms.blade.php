@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/rooms.css') }}">
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const checkboxes = document.querySelectorAll('.room-checkbox');
			const totalPriceElement = document.getElementById('totalPrice');

			checkboxes.forEach(checkbox => {
				checkbox.addEventListener('change', () => {
					let total = 0;
					checkboxes.forEach(cb => {
						if (cb.checked) {
							total += parseInt(cb.dataset.price);
						}
					});
					totalPriceElement.textContent = total;
				});
			});
		});
	</script>
@endsection

@section('content')
	<form id="reservation-form" action="{{ route('reservations.create') }}" method="get">
		@csrf
		<input type="hidden" name="checkIn" value="{{ $checkIn }}">
		<input type="hidden" name="checkOut" value="{{ $checkOut }}">

		<div class="container">
			@forelse($availableRooms as $room)
				<div class="room-container">
					<input type="checkbox" class="room-checkbox" name="room_ids[]" value="{{ $room['id'] }}" data-price="{{ $room['price'] }}">
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
						<p class="description">{{ $room['description'] }}</p>
						<p class="price">Цена: {{ $room['price'] }} руб.</p>
						<a href="{{ route('rooms.show', $room) }}">Подробнее</a>
					</div>
				</div>
			@empty
				<p>Извините, в указанные даты нет доступных номеров.</p>
			@endforelse
			
			@if(!$availableRooms->isEmpty())
				<div class="total">
					Общая сумма: <span id="totalPrice">0</span> руб.
				</div>
				<button class="button" type="submit">Бронировать</button>
			@endif
		</div>
	</form>
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