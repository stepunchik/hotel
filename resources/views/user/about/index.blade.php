@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<link rel="stylesheet" href="{{ asset('css/about.css') }}"/>
	<style type="text/css">
		@foreach($services as $service)
			.image-{{ $service['id'] }} {
				background-image: url({{ asset('/storage/' . $service['image']) }});
			}
		@endforeach
	</style>
@endsection

@section('title', 'Главная')

@section('content')
	<div class="container">
		<div class="about-container container-mt">
			<h2 class="section-title">Как все устроено?</h2>
			<div class="info">
				<p>{!! $info['content'] !!}</p>
			</div>
			<div class="rules">
				<p>{!! $rules['content'] !!}</p>				
			</div>
		</div>
		<div class="services-container container-mt">
			<h2 class="section-title">Услуги и удобства отеля</h2>
			<div class="service-card-container">
				@forelse($services as $service)
					<div class="service-card">
						<div class="service-image image-{{ $service['id'] }}"></div>
						<div>{{ $service['name'] }}</div>
						<div>{{ $service['description'] }}</div>
					</div>
				@empty
					<p>Услуг пока нет.</p>
				@endforelse
			</div>
		</div>
		<div class="photos container-mt">
			<h2 class="section-title">Фото отеля</h2>
			<div class="photos-container">
				@forelse($photos as $photo)
					<img class="photo" src="{{ asset('/storage/' . $photo['image']) }}" alt="">
				@empty
					<p>Фото пока нет.</p>
				@endforelse
			</div>
		</div>
		<div class="reviews-container container-mt">
			<h2 class="section-title">Отзывы</h2>
			<div class="swiper">
				<div class="swiper-wrapper">
					@forelse($reviews as $review)
						@if($review['approved'] == true)
							<div class="swiper-slide">
								<p class="review-text">{{ $review['text'] }}</p>
								<div class="bottom-review-container">
									<div>
										<div class="">Оценка: {{ $review['rating'] }}</div>
										<div class="review-author">{{ $review['author'] }}</div>
									</div>
								</div>
							</div>
						@endif
					@empty
						<p>Отзывов пока нет.</p>
					@endforelse
				</div>

				<div class="swiper-pagination"></div>
			</div>
			@auth
				@if(Auth::user()->hasRole('user'))
					<div class="button-container">
						<a class="button" href="{{ route('review.create') }}">Оставить отзыв</a>
					</div>
				@endif
			@endauth
		</div>
		<div class="contact-container container-mt">
			<h2 class="section-title">Контакты</h2>
			<div class="contact-info">
				<div class="contact-card">
					<img class="contact-card-image" src="{{ asset('img/map-icon.png') }}">
					<div class="section-title">Как нас найти?</div>
					<p>ул. Зеленая, 123  Город, Страна</p>
				</div>
				
				<div class="contact-card">
					<img class="contact-card-image" src="{{ asset('img/phone-icon.png') }}">
					<div class="section-title">Как нам позвонить?</div>
					<p>+12 345 678 910</p>
				</div>
				
				<div class="contact-card">
					<img class="contact-card-image" src="{{ asset('img/email-icon.png') }}">
					<div class="section-title">Как нам написать?</div>
					<p>info@eco-oasis.com</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('swiper')
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script>
		const swiper = new Swiper('.swiper', {
			slidesPerView: 3,
			spaceBetween: 30,
			loop: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
		});
	</script>
@endsection