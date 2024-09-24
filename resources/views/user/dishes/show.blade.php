@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/show.css') }}">
	<style type="text/css">
		.title {
			font-size: 3rem;
		}

		.image {
			width: 20dvw;
			margin: 20px;
		}
	</style>
@endsection

@section('title')
	{{ $dish['name'] }}
@endsection

@section('content')
	<div class="back-button-container">
		<a class="back-button" href="{{ url()->previous() }}"><- Назад</a>
	</div>
	<div class="container">
		<div class="title-container">
			<div class="title">{{ $dish['name'] }}</div>
		</div>
		<div class="item-container">
			<img class="image" src="{{ asset('/storage/' . $dish['image']) }}" alt="{{ $dish['title'] }}">
			<div class="inner-container">
				<p class="text">{{ $dish['ingredients'] }}</p>
				<div class="cost">Цена: {{ $dish['price'] }}</div>
			</div>			
		</div>		
	</div>
@endsection