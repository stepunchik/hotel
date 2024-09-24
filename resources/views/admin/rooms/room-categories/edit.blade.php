@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
    <style type="text/css">
    	.form {
    		width: 500px;
    	}
    </style>
@endsection

@section('title', 'Изменение категории номеров')

@section('content')
	<div class="form-container">        
		<h1 class="title">Изменение категории номеров</h1>    
        <form class="form" id="form" action="{{ route('admin.room-categories.update', $roomCategory) }}" method="post" enctype=multipart/form-data>
            @csrf
            @method('PUT')
			
			<div class="field-group">
				<label class="field-label" for="name">Название категории:</label>
				<input class="field" type="text" name="name" id="name" value="{{ $roomCategory['name'] }}">
            </div>
			@error('name')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

            <button class="button" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
