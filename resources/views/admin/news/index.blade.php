@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('title', 'Новости')

@section('content')
	<h1 class="title">Новости</h1>
	<div class="buttons-container">
		<a class="button" href="{{ route('admin.news.create') }}">+ Добавить новость</a>
	</div>
	<div class="container">
		@foreach($news as $article)		
			<div class="item-container">
				<div>
					<img class="image" src="{{ asset('/storage/' . $article['image']) }}" alt="{{ $article['title'] }}">
					<div class="created-date">Дата создания: {{ $article['created_at'] }}</div>
					<div class="created-date">Последнее обновление: {{ $article['updated_at'] }}</div>
				</div>
				<div class="inner-container">
					<div class="item-title">{{ $article['title'] }}</div>
					<p class="text">{{ $article['text'] }}</p>
					<form action="{{ route('admin.news.destroy', $article['id']) }}" method="POST">
						@csrf
						@method('DELETE')
						
						<button class="secondary-button button-size">Удалить</button>
						<a class="button button-size" href="{{ route('admin.news.edit', $article['id']) }}">Редактировать</a>
					</form>
				</div>
			</div>
		@endforeach
		<div>
			{{ $news->links() }}
		</div>
	</div>
@endsection
