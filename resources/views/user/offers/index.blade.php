@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/offers.css') }}"/>
@endsection

@section('title', 'Спецпредложения')

@section('content')
	<div class="container">
		<h1 class="title">Спецпредложения</h1>
		<div class="offers">
			<div class="card">
				<div class="name">Спецпредложение №1</div>
				<p class="text">Текст предложения</p>
			</div>
			<div class="card">
				<div class="name">Спецпредложение №2</div>
				<p class="text">Текст предложения</p>
			</div>
			<div class="card">
				<div class="name">Спецпредложение №3</div>
				<p class="text">Текст предложения</p>
			</div>
		</div>
	</div>
@endsection