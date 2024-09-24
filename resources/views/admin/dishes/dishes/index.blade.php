@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('title', 'Блюда')

@section('content')
	<h1 class="title">Блюда</h1>
	<div class="buttons-container">
		@if(!$dishCategories->isEmpty())
			<a class="button button-size" href="{{ route('admin.dishes.create') }}">+ Добавить блюдо</a>
		@endif
		<a class="button button-size" href="{{ route('admin.dish-categories.create') }}">+ Добавить категорию блюд</a>
	</div>
	<div class="container">
		@foreach($dishes as $dish)		
			<div class="item-container">
				<div>
					<img class="image" src="{{ asset('/storage/' . $dish['image']) }}" alt="{{ $dish['name'] }}">
					<div class="created-date">Дата создания: {{ $dish['created_at'] }}</div>
					<div class="created-date">Последнее обновление: {{ $dish['updated_at'] }}</div>
				</div>
				<div class="inner-container">
					<div class="item-title">Название: {{ $dish['name'] }}</div>
					<p class="text">Ингредиенты: {{ $dish['ingredients'] }}</p>
					<div class="text">Цена: {{ $dish['price'] }}</div>
					<div class="text">Категория: {{ $dish->category->name }}</div>
					<form action="{{ route('admin.dishes.destroy', $dish['id']) }}" method="POST">
						@csrf
						@method('DELETE')
						
						<button class="secondary-button button-size">Удалить</button>
						<a class="button button-size" href="{{ route('admin.dishes.edit', $dish['id']) }}">Редактировать</a>
					</form>
				</div>
			</div>
		@endforeach
		<div>
			{{ $dishes->links() }}
		</div>
	</div>
@endsection
