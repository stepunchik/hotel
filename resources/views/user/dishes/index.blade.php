@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/dishes.css') }}"/>
@endsection

@section('title', 'Блюда')

@section('content')
    <div class="container">
		@foreach($dishes as $dish) 
			<div class="dish-container">
				<div class="image-container">
					<img class="image" src="{{ asset('/storage/' . $dish['image']) }}" alt="{{ $dish['name'] }}">
				</div>
				<div class="inner-container">
					<div class="name">{{ $dish['name'] }}</div>
					<div>{{ $dish['price'] }} руб.</div>
					<div class="link-container">
						<a class="button" href="{{ route('dishes.show', $dish['id']) }}">Подробнее</a>
					</div>
				</div>
			</div>
		@endforeach
		<div>
			{{ $dishes->links() }}
		</div>
	</div>
@endsection