@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('title', 'Бронирование')

@section('content')
	<div class="form-container">            
        <form class="form" id="room-search-form" action="{{ route('reservations.available-rooms') }}" method="get" enctype=multipart/form-data>
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="check_in">Дата заезда:</label>
				<input class="field" type="date" name="check_in" id="check_in" value="{{ old('check_in') }}">
            </div>
			@error('check_in')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
			<div class="field-group">
				<label class="field-label" for="check_out">Дата выезда:</label>
				<input class="field" type="date" name="check_out" id="check_out" value="{{ old('check_out') }}">
            </div>
			@error('check_out')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

            <button class="button" type="submit">Найти</button>
        </form>
    </div>
@endsection
