@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/categories.css') }}"/>
@endsection

@section('title', 'Категории номеров')

@section('content')
    <div class="container">
		@foreach($roomCategories as $category)
			<a href="{{ route('room-categories.rooms-from-category', $category['id']) }}">
				<div class="category-container">
					<div class="category-title">{{ $category['name'] }}</div>
				</div>
			</a>
		@endforeach
	</div>
@endsection