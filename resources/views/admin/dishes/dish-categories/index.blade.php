@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/categories-index.css') }}">
@endsection

@section('title', 'Категории блюд')

@section('content')
	<h1 class="title">Категории блюд</h1>
	<div class="buttons-container">
		<a class="button" href="{{ route('admin.dish-categories.create') }}">+ Добавить категорию</a>
	</div>
	<div class="categories-container">
		@foreach($dishCategories as $category)
			<div class="category-container">
				<div>
					<div class="title">{{ $category['name'] }}</div>
					<div class="created-date">Дата создания: {{ $category['created_at'] }}</div>
					<div class="created-date">Последнее обновление: {{ $category['updated_at'] }}</div>	
				</div>				
				<form class="form" action="{{ route('admin.dish-categories.destroy', $category) }}" method="POST">
					@csrf
					@method('DELETE')
					
					<button class="secondary-button button-size">Удалить</button>
					<a class="button button-size" href="{{ route('admin.dish-categories.edit', $category) }}">Редактировать</a>
				</form>
			</div>
		@endforeach
		<div>
			{{ $dishCategories->links() }}
		</div>
	</div>
@endsection
