@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection

@section('title', 'Добавление фото')

@section('content')
	<div class="form-container">
		<h1 class="title">Добавление фото</h1>        
        <form class="form" id="form" action="{{ route('admin.photos.store', $room) }}" method="post" enctype=multipart/form-data>
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="image">Изображения:</label>
				<input class="field" type="file" name="images[]" id="image" multiple value="{{ old('images') }}">
            </div>
			@error('image')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

            <button class="button" type="submit">Добавить</button>
        </form>
    </div>
@endsection
