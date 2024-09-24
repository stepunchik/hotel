@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('title', 'Страницы')

@section('content')
	<h1 class="title">Содержимое страниц</h1>
	<div class="buttons-container">
		<a class="button button-size" href="{{ route('admin.pages.create') }}">+ Изменить секцию</a>
	</div>
	<div class="container">
		@foreach($contents as $content)
			<div class="item-container">
				<div>Содержимое секции {{ $content['section'] }}:</div>
				<p>{!! $content['content'] !!}</p>
			</div>
		@endforeach
		<div>
			{{ $contents->links() }}
		</div>
	</div>
@endsection
