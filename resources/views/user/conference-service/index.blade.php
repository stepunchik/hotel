@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/conference-service.css') }}"/>
@endsection

@section('title', 'Конференц-сервис')

@section('content')
	<div class="container">
		<img class="image" src="{{ asset('img/conference.jpg') }}" alt="">
		<h2 class="title">В нашем отеле есть конференц-зал</h2>
		<p class="text">В этом зале вы можете проводить бизнес-встречи, а также собрания на 50 человек.</p>
	</div>
@endsection