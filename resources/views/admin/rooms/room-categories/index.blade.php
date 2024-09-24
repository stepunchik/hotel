@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/categories-index.css') }}">
@endsection

@section('title', 'Категории номеров')

@section('content')
	<h1 class="title">Категории номеров</h1>
	<div class="buttons-container">
		<a class="button" href="{{ route('admin.room-categories.create') }}">+ Добавить категорию</a>
	</div>
	<div class="categories-container">
		@foreach($roomCategories as $category)
			<div class="category-container">
				<div>
					<div class="title">{{ $category['name'] }}</div>
					<div class="created-date">Дата создания: {{ $category['created_at'] }}</div>
					<div class="created-date">Последнее обновление: {{ $category['updated_at'] }}</div>
				</div>	
				<form class="form" action="{{ route('admin.room-categories.destroy', $category) }}" method="POST">
					@csrf
					@method('DELETE')
					
					<button class="secondary-button button-size">Удалить</button>
					<a class="button button-size" href="{{ route('admin.room-categories.edit', $category) }}">Редактировать</a>
				</form>
			</div>
		@endforeach
		<div>
			{{ $roomCategories->links() }}
		</div>
	</div>
@endsection
