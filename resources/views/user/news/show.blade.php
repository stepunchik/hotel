@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('title')
	{{ $news['title'] }}
@endsection

@section('content')
	<div class="back-button-container">
		<a class="back-button" href="{{ url()->previous() }}"><- Назад</a>
	</div>
	<div class="container">
		<div class="title">{{ $news['title'] }}</div>
		<div class="created-date">{{ $news['created_at'] }}</div>
		<img class="image" src="{{ asset('/storage/' . $news['image']) }}" alt="{{ $news['title'] }}">
		<p class="text">{{ $news['text'] }}</p>
	</div>
@endsection