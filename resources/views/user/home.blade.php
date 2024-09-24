@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<link rel="stylesheet" href="{{ asset('css/home.css') }}"/>
	<style type="text/css">
		.hotel-image {
			background-image: url({{url('img/hotel_image.png')}});
		}
	</style>
@endsection

@section('title', 'Главная')

@section('content')
	<div class="hotel-image">
		<div class="hotel-image-blur"></div>
	</div>
	<div class="welcome-message-container">
		<h1 class="title">добро пожаловать в эко отель</h1>
	</div>
	<div class="quote-container">
		<p class="quote">"Оазис роскоши и уюта: ваше идеальное пристанище в мире гостеприимства!"</p>
	</div>
	<hr class="hr" noshade size="1px">
	<div class="container">
		<div class="about-container container-mt">
			<div class="left-container">
				<h2 class="section-title">Об отеле</h2>
				<p>
				  {!! $about['content'] !!}
				</p>
			</div>
			<div class="right-container">
				<img class="relative-image" src="{{ asset('img/about1.png') }}" alt="">
				<img class="absolute-image" src="{{ asset('img/about2.png') }}" alt="">
			</div>
		</div>
		<div class="news-container container-mt">
			<h2 class="section-title">Новости</h2>
			<div class="inner-news-container">
				@forelse($news as $article)
					<div class="article-container">
						<div class="article-image-container">
							<img class="article-image" src="{{ asset('/storage/' . $article['image']) }}" alt="{{ $article['title'] }}">
							<div class="created-date">{{ $article['created_at'] }}</div>
						</div>
						<div class="article">
							<div class="article-title">{{ $article['title'] }}</div>
							<p class="article-text">{{ $article['text'] }}</p>
							<div class="show-link-container">
								<a href="{{ route('news.show', $article) }}">Подробнее</a>
							</div>
						</div>
					</div>
				@empty
					<p>Новостей пока нет.</p>
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
										<div class="review-item">Оценка: {{ $review['rating'] }}</div>
										<div class="review-item">{{ $review['author'] }}</div>
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