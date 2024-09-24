@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection

@section('title', 'Добавление номера')

@section('content')
	<div class="form-container">
		<h1 class="title">Добавление номера</h1>         
        <form class="form" id="form" action="{{ route('admin.rooms.store') }}" method="post" enctype=multipart/form-data>
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="name">Название номера:</label>
				<input class="field" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
			@error('name')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="description">Описание номера:</label>
				<textarea class="field" name="description" id="description">{{ old('description') }}</textarea>
            </div>
			@error('description')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="beds_num">Количество спальных мест:</label>
				<input class="field" type="number" name="beds_num" id="beds_num" min="0" value="{{ old('beds_num') }}">
            </div>
			@error('beds_num')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="image">Изображение:</label>
				<input class="field" type="file" name="images[]" id="image" multiple value="{{ old('images') }}">
            </div>
			@error('image')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="price">Цена номера:</label>
				<input class="field" type="number" name="price" id="price" min="0" value="{{ old('price') }}">
            </div>
			@error('price')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="category_id">Категория номера:</label>
				<select class="field" name="category_id" id="category_id">
				@foreach($roomCategories as $category)
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
