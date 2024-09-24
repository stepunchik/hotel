@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('title', 'Услуги')

@section('content')
	<h1 class="title">Услуги</h1>
	<div class="buttons-container">
		<a class="button" href="{{ route('admin.services.create') }}">+ Добавить услугу</a>
	</div>
	<div class="container">
		@foreach($services as $service)		
			<div class="item-container">
				<div>
					<img class="image" src="{{ asset('/storage/' . $service['image']) }}" alt="{{ $service['name'] }}">
					<div class="created-date">Дата создания: {{ $service['created_at'] }}</div>
					<div class="created-date">Последнее обновление: {{ $service['updated_at'] }}</div>
				</div>
				<div class="inner-container">
					<div class="item-title">{{ $service['name'] }}</div>
					<p class="text">{{ $service['description'] }}</p>
					<form action="{{ route('admin.services.destroy', $service['id']) }}" method="POST">
						@csrf
						@method('DELETE')
						
						<button class="secondary-button button-size">Удалить</button>
						<a class="button button-size" href="{{ route('admin.services.edit', $service['id']) }}">Редактировать</a>
					</form>
				</div>
			</div>
		@endforeach
		<div>
			{{ $services->links() }}
		</div>
	</div>
@endsection
