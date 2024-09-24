@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('title', 'Отзывы')

@section('content')
	<h1 class="title">Отзывы</h1>
	<div class="container container-mt">
		@foreach($reviews as $review)	
			<div class="item-container">
				<div>
					<div class="item-title">{{ $review['author'] }}</div>
					<p class="text">{{ $review['text'] }}</p>
					@if($review['approved'])
						<div class="message-text">Одобрено</div>
					@else
						<div class="message-text">На рассмотрении</div>
					@endif
					<div class="created-date">Дата создания: {{ $review['created_at'] }}</div>
					<div class="created-date">Последнее обновление: {{ $review['updated_at'] }}</div>
				</div>
				<div>
					<form action="{{ route('admin.reviews.destroy', $review['id']) }}" method="POST">
						@csrf
						@method('DELETE')
						
						@if($review['approved'])
							<button class="secondary-button button-size" type="submit">Удалить</button>
						@else
							<button class="secondary-button button-size" type="submit">Отклонить</button>
						@endif
					</form>
					@if(!$review['approved'])
						<form action="{{ route('admin.reviews.approve', $review['id']) }}" method="POST">
							@csrf

							<button class="button button-size" type="submit">Одобрить</button>
						</form>
					@endif					
				</div>
			</div>
		@endforeach
		<div>
			{{ $reviews->links() }}
		</div>
	</div>
@endsection
