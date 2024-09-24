@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
    <style type="text/css">
    	.image {
    		width: 70%;
    	}
    </style>
@endsection

@section('title', 'Редактирование фото')

@section('content')
    <h1 class="title">Редактирование фото</h1>
    <form class="form" id="form" action="{{ route('admin.photos.update', $photo) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
		
		<div class="created-date">Дата создания: {{ $photo['created_at'] }}</div>
        <div class="created-date">Последнее обновление: {{ $photo['updated_at'] }}</div>
		
		<div class="image-container">
			<img class="image" src="{{ asset('/storage/' . $photo['image']) }}" alt="">
		</div>

		<div class="field-group">
			<label class="field-label" for="image">Изображение:</label>
			<input class="field" type="file" name="image" id="image">
		</div>
		@error('image')
			<div class="invalid-input-message">{{ $message }}</div>
		@enderror
		
        <div class="button-container">
            <button class="button" type="submit">Сохранить</button>
        </div>
    </form>
@endsection