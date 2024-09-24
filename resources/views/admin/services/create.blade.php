@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection

@section('title', 'Добавление услуги')

@section('content')
	<h1>Добавление услуги</h1>
	<div class="form-container">            
        <form class="form" id="form" action="{{ route('admin.services.store') }}" method="post" enctype=multipart/form-data>
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="name">Название услуги:</label>
				<input class="field" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
			@error('name')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="description">Описание услуги:</label>
				<textarea class="field" name="description" id="description">{{ old('description') }}</textarea>
            </div>
			@error('description')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="image">Изображение:</label>
				<input class="field" type="file" name="image" id="image" value="{{ old('image') }}">
            </div>
			@error('image')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

            <button class="button" type="submit">Добавить</button>
        </form>
    </div>
@endsection
