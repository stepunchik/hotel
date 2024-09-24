@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection

@section('title', 'Добавление новости')

@section('content')
	<h1>Добавление новости</h1>
	<div class="form-container">            
        <form class="form" id="form" action="{{ route('admin.news.store') }}" method="post" enctype=multipart/form-data>
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="title">Заголовок новости:</label>
				<input class="field" type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
			@error('title')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="text">Текст новости:</label>
				<textarea class="field" name="text" id="text">{{ old('text') }}</textarea>
            </div>
			@error('text')
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
            <button class="button" type="reset">Очистить</button>
        </form>
    </div>
@endsection
