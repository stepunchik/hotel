@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
    <style type="text/css">
    	.form-container {
    		width: 40dvw;
    	}
    </style>
@endsection

@section('scripts')
	<script type="importmap">
	    {
	        "imports": {
	            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
	            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
	        }
	    }
	</script>

	<script type="module">
	    import {
	        ClassicEditor,
	        Essentials,
	        Bold,
	        Italic,
	        Font,
	        Paragraph
	    } from 'ckeditor5';


	    function createEditor(editorId) {
		    ClassicEditor
		        .create(document.querySelector(editorId), {
		            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
		            toolbar: {
		                items: [
		                    'undo', 'redo', '|', 'bold', 'italic', '|',
		                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
		                ]
		            },

		        } )
		        .then()
		        .catch();
	    }

	    createEditor('#editor1')
	    createEditor('#editor2')
	    createEditor('#editor3')
	</script>

@endsection

@section('content')
	<div class="form-container">
		<h1 class="title">Изменить секцию</h1>
		<form class="form" method="POST" action="{{ route('admin.pages.store') }}">
			@csrf
			@foreach($contents as $content)
				<div class="field-group">
					<label class="field-label">{{ $content['section'] }}</label>
					<textarea name="{{ $content['section'] }}" class="form-control" id="editor{{ $loop->index + 1 }}">{{ $content['content'] }}</textarea>
				</div>
			@endforeach
			

			<button class="button" type="submit">Сохранить</button>
		</form>	
	</div>	
@endsection