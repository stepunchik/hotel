@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection

@section('title', 'Добавление категории номеров')

@section('content')
	<div class="form-container">        
		<h1 class="title">Добавление категории номеров</h1>    
        <form class="form" id="form" action="{{ route('admin.room-categories.store') }}" method="post" enctype=multipart/form-data>
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="name">Название категории:</label>
				<input class="field" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
			@error('name')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

            <button class="button" type="submit">Добавить</button>
        </form>
    </div>
@endsection
