@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('title', 'Оставить отзыв')

@section('content')
	<div class="form-container">            
        <form class="form" action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
            @csrf
			
			<div class="field-group">
				<label class="field-label" for="text">Текст отзыва:</label>
				<textarea class="field" name="text" id="text">{{ old('text') }}</textarea>
			</div>
			@error('text')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror

			<div class="field-group">
				<label class="field-label" for="rating">Оценка:</label>
				<input class="field" type="number" name="rating" id="rating" value="{{ old('rating') }}" min="1" max="5">
			</div>
			@error('rating')
				<div class="invalid-input-message">{{ $message }}</div>
			@enderror
			
            <button class="button" type="submit">Оставить отзыв</button>
        </form>
    </div>
@endsection
