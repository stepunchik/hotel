@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/edit.css') }}">
@endsection

@section('title', 'Редактирование услуги')

@section('content')
    <h1 class="title">Редактирование услуги</h1>
    <form class="form" id="form" action="{{ route('admin.services.update', $service['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="created-date">Дата создания: {{ $service['created_at'] }}</div>
        <div class="created-date">Последнее обновление: {{ $service['updated_at'] }}</div>

        <div class="field-group">
            <label class="field-label" for="name">Название услуги:</label>
            <input class="field" type="text" name="name" id="name" value="{{ $service['name'] }}">
        </div>
        @error('name')
            <div class="invalid-input-message">{{ $message }}</div>
        @enderror
        
        <div class="field-group">
            <label class="field-label" for="description">Описание услуги:</label>
            <textarea class="field" name="description" id="description">{{ $service['description'] }}</textarea>
        </div>
        @error('description')
            <div class="invalid-input-message">{{ $message }}</div>
        @enderror
        
        <div class="field-group">
            <img class="image" src="{{ asset('/storage/' . $service['image']) }}" alt="{{ $service['name'] }}">
            <label class="field-label" for="image">Изображение:</label>
            <input class="field" type="file" name="image" id="image" value="{{ $service['image'] }}">
        </div>
        @error('image')
            <div class="invalid-input-message">{{ $message }}</div>
        @enderror
        <div>
            <button class="button" type="submit">Сохранить</button>
        </div>
    </form>
@endsection