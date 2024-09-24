@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/categories.css') }}"/>
@endsection

@section('title', 'Категории блюд')

@section('content')
    <div class="container">
		@foreach($dishCategories as $category)
			<a href="{{ route('dish-categories.dishes-from-category', $category['id']) }}">
				<div class="category-container">
					<div class="category-title">{{ $category['name'] }}</div>
				</div>
			</a>
		@endforeach
	</div>
@endsection