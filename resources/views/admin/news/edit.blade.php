@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
    <style type="text/css">
        .image {
            width: 70%;
        }
    </style>
@endsection

@section('title', 'Редактирование новости')

@section('content')
    <h1 class="title">Редактирование новости</h1>
    <form class="form" id="form" action="{{ route('admin.news.update', $news) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="created-date">Дата создания: {{ $news['created_at'] }}</div>
        <div class="created-date">Последнее обновление: {{ $news['updated_at'] }}</div>

        <div class="field-group">
            <label class="field-label" for="title">Заголовок новости:</label>
            <input class="field" type="text" name="title" id="title" value="{{ $news['title'] }}">
        </div>
        @error('title')
            <div class="invalid-input-message">{{ $message }}</div>
        @enderror
        
        <div class="field-group">
            <label class="field-label" for="text">Текст новости:</label>
            <textarea class="field" name="text" id="text">{{ $news['text'] }}</textarea>
        </div>
        @error('text')
            <div class="invalid-input-message">{{ $message }}</div>
        @enderror
        
        <div class="image-container">
            <img class="image" src="{{ asset('/storage/' . $news['image']) }}" alt="{{ $news['title'] }}">
        </div>
        <div class="field-group">
            <label class="field-label" for="image">Изображение:</label>
            <input class="field" type="file" name="image" id="image" value="{{ $news['image'] }}">
        </div>
        @error('image')
            <div class="invalid-input-message">{{ $message }}</div>
        @enderror
        <div class="button-container">
            <button class="button" type="submit">Сохранить</button>
        </div>
    </form>
@endsection