@extends('layouts.admin')

@section('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
    <style type="text/css">
    	.button-size {
    		width: 250px;
    	}
    </style>
@endsection

@section('title', 'Фото')

@section('content')
	<h1 class="title">Фото</h1>
	<div class="container">
		@foreach($rooms as $room)		
			<div class="room-container">
				<div>
					<div class="swiper">
						<div class="swiper-wrapper">
							@foreach($room->photos as $photo)
								<div class="swiper-slide">
									<img class="image" src="{{ asset('/storage/' . $photo['image']) }}" alt="{{ $room['name'] }}">
									<a class="button button-size" href="{{ route('admin.photos.edit', $photo) }}">Редактировать фото</a>
									<form action="{{ route('admin.photos.destroy', $photo) }}" method="POST">
										@csrf
										@method('DELETE')
										
										<button class="secondary-button button-size">Удалить фото</button>
									</form>
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
					<a class="button button-size" href="{{ route('admin.photos.create', $room) }}">+ Добавить фото</a>
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