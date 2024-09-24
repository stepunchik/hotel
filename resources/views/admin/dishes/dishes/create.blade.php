@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection

@section('title', 'Добавление блюда')

@section('content')
	<div class="form-container">      
		<h1 class="title">Добавление блюда</h1>      
        <form class="form" id="form" action="{{ route('admin.dishes.store') }}" method="post" enctype=multipart/form-data>
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="name">Название блюда:</label>
				<input class="field" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
			@error('name')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="ingredients">Ингредиенты:</label>
				<textarea class="field" name="ingredients" id="ingredients">{{ old('ingredients') }}</textarea>
            </div>
			@error('ingredients')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="image">Изображение:</label>
				<input class="field" type="file" name="image" id="image" value="{{ old('image') }}">
            </div>
			@error('image')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="price">Цена блюда:</label>
				<input class="field" type="number" name="price" id="price" value="{{ old('price') }}">
            </div>
			@error('price')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="category_id">Категория блюда:</label>
				<select class="field" name="category_id" id="category_id">
					@foreach($dishCategories as $category)
						<option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
					@endforeach
				</select>
            </div>
			@error('category_id')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

            <button class="button" type="submit">Добавить</button>
        </form>
    </div>
@endsection
