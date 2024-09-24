@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('title', 'Бронирование')

@section('content')
	<div class="form-container">            
        <form class="form" id="form" action="{{ route('reservations.store') }}" method="post" enctype=multipart/form-data>
            @csrf
			
			@foreach ($roomIds as $roomId)
				<input type="hidden" name="room_ids[]" value="{{ $roomId }}">
			@endforeach
			<input type="hidden" name="check_in" value="{{ $checkIn }}">
			<input type="hidden" name="check_out" value="{{ $checkOut }}">
			
			@guest
				<div class="field-group">
					<label class="field-label" for="name">ФИО:</label>
					<input class="field" type="text" name="name" id="name" value="{{ old('name') }}">
				</div>
				@error('name')
					<div class="invalid-input-message">{{ $message }}</div>
				@enderror
				
				<div class="field-group">
					<label class="field-label" for="email">Электронная почта:</label>
					<input class="field" type="email" name="email" id="email" value="{{ old('email') }}">
				</div>
				@error('email')
					<div class="invalid-input-message">{{ $message }}</div>
				@enderror
			@else
				<input type="hidden" name="name" value="{{ auth()->user()->name }}">
				<input type="hidden" name="email" value="{{ auth()->user()->email }}">
			@endguest	
			
			<div class="field-group">
				<label class="field-label" for="phone_number">Номер телефона:</label>
				<input class="field" type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
            </div>
			@error('phone_number')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

            <button class="button" type="submit" id="find-rooms">Бронировать</button>
        </form>
    </div>
@endsection
