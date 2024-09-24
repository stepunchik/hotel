@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
@endsection

@section('title', 'Редактирование номера')

@section('content')
    <h1 class="title">Редактирование номера</h1>
    <form class="form" id="form" action="{{ route('admin.rooms.update', $room['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
		
		<div class="created-date">Дата создания: {{ $room['created_at'] }}</div>
        <div class="created-date">Последнее обновление: {{ $room['updated_at'] }}</div>
        
        <div class="field-group">
			<label class="field-label" for="name">Название номера:</label>
			<input class="field" type="text" name="name" id="name" value="{{ $room['name'] }}">
		</div>
		@error('name')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="field-group">
			<label class="field-label" for="description">Описание номера:</label>
			<textarea class="field" name="description" id="description">{{ $room['description'] }}</textarea>
		</div>
		@error('description')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="field-group">
			<label class="field-label" for="beds_num">Количество спальных мест:</label>
			<input class="field" type="number" name="beds_num" id="beds_num" value="{{ $room['beds_num'] }}">
		</div>
		@error('beds_num')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="images-container">
			@foreach($room->photos as $photo)
				<img class="image" src="{{ asset('/storage/' . $photo['image']) }}" alt="{{ $room['name'] }}">
			@endforeach		
		</div>
		<div class="field-group">
			<label class="field-label" for="image">Изображение:</label>
			<input class="field" type="file" name="images[]" id="image" multiple>
		</div>
		@error('image')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror		
		
		<div class="field-group">
			<label class="field-label" for="price">Цена номера:</label>
			<input class="field" type="number" name="price" id="price" value="{{ $room['price'] }}">
		</div>
		@error('price')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
		<div class="field-group">
			<label class="field-label" for="category_id">Категория номера:</label>
			<select class="field" name="category_id" id="category_id">
				@foreach($roomCategories as $category)
					<option value="{{ $category->id }}" {{ $room['category_id'] == $category['id'] ? 'selected' : '' }}>
						{{ $category['name'] }}
					</option>
				@endforeach
			</select>
		</div>
		@error('category_id')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
        <div>
            <button class="button" type="submit">Сохранить</button>
            <button class="button" type="reset">Очистить</button>
        </div>
    </form>
@endsection