@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
@endsection

@section('title', 'Редактирование блюда')

@section('content')
    <h1 class="title">Редактирование блюда</h1>
    <form class="form" id="form" action="{{ route('admin.dishes.update', $dish['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
		
		<div class="created-date">Дата создания: {{ $dish['created_at'] }}</div>
        <div class="created-date">Последнее обновление: {{ $dish['updated_at'] }}</div>
        
        <div class="field-group">
			<label class="field-label" for="name">Название блюда:</label>
			<input class="field" type="text" name="name" id="name" value="{{ $dish['name'] }}">
		</div>
		@error('name')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="field-group">
			<label class="field-label" for="ingredients">Ингредиенты:</label>
			<textarea class="field" name="ingredients" id="ingredients">{{ $dish['ingredients'] }}</textarea>
		</div>
		@error('ingredients')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="field-group">
			<label class="field-label" for="image">Изображение:</label>
			<input class="field" type="file" name="image" id="image">
		</div>
		@error('image')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="field-group">
			<label class="field-label" for="price">Цена блюда:</label>
			<input class="field" type="number" name="price" id="price" value="{{ $dish['price'] }}">
		</div>
		@error('price')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="field-group">
			<label class="field-label" for="category_id">Категория блюда:</label>
			<select class="field" name="category_id" id="category_id">
				@foreach($dishCategories as $category)
					<option value="{{ $category['id'] }}" {{ $dish['category_id'] == $category['id'] ? 'selected' : '' }}>
						{{ $category['name'] }}
					</option>
				@endforeach
			</select>
		</div>
		@error('category_id')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
        <div>
			<a class="secondary-button button-size" href="{{ route('admin.dishes.destroy', $dish['id']) }}">Удалить</a>
            <button class="button" type="submit">Сохранить</button>
            <button class="button" type="reset">Очистить</button>
        </div>
    </form>
@endsection