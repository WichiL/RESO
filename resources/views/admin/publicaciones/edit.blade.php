@extends('admin.layout')

@section('header')
	<h1>
		POSTS
        <small>Crear Publicación</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Publicaciones</a></li>
      <li class="active">Crear</li>
    </ol>
@stop

@section('content')

<div class="row">
	<form method="POST" action="{{ route('admin.posts.update', $post) }}">
		{{ csrf_field() }} {{ method_field('PUT') }}		
		<div class="col-md-8">
			<div class="box box-primary">
			    
			   		<div class="box-body">
			   			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
			   				<label>Titulo de la Publicación</label>
			   				<input name="title" class="form-control" placeholder="Ingrese aqui el titulo de la publicación"
			   				value="{{ old('title', $post->title)}}">
			   				{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
			   			</div>

			    		<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
			    			<label>Contenido de la publicación</label>
			    			<textarea id="editor" rows="10" name="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación...">{{ old('body', $post->body) }}</textarea>
			    			{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
			    		</div>

			   	 	</div>		   
			</div>		
		</div>	
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
			        <div class="form-group">
			            <label>Fecha de publicación:</label>
			            <div class="input-group date">
			                <div class="input-group-addon">
				                <i class="fa fa-calendar"></i>
			                </div>
			                <input name="published_at" type="text" class="form-control pull-right" id="datepicker" 
			                value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
			            </div>
			        </div>	
			        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}" >
			        	<label>Categorias</label>
			        	<select name="category" class="form-control">
			        		<option value="">Selecciona una categoria</option>
			        		@foreach ($categories as $category)
			        			<option value="{{ $category->id }}"
			        			 {{ old('category', $post->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
			        		@endforeach
			        	</select>
			        	{!! $errors->first('category', '<span class="help-block">:message</span>') !!}
			        </div>	

					<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
						<label>Etiquetas</label>
						<select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o más etiquetas"
                        style="width: 100%;">
		             	@foreach ($tags as $tag)
		             		<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
		             	@endforeach
		                </select>{!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
					</div>

			    	<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
			    		<label>Extracto de la publicación</label>
			    		<textarea name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación...">{{ old('excerpt', $post->excerpt) }}</textarea>
			    		{!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
			    	</div>	

			    	<div class="form-group">
			    		<div class="dropzone"></div>

			    	</div>	

			    	<div class="form-group">
			    		<button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
			    	</div>		
				</div>
			</div>
		</div>	
	</form>
</div>


@stop

@push('styles')
	<link rel="stylesheet" href="/adminLTE/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="/adminLTE/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

@endpush

@push('scripts')
	<script src="/adminLTE/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

	<script src="/adminLTE/plugins/ckeditor/ckeditor.js"></script>

	<script src="/adminLTE/plugins/select2/dist/js/select2.full.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

	<script type="text/javascript">
		$('#datepicker').datepicker({
     		autoclose: true
    	})
    	CKEDITOR.replace('editor');
    	 $('.select2').select2();

    	 var myDropzone = new Dropzone(".dropzone", {
    	 	url: '/admin/posts/{{ $post->url }}/photos',
    	 	// acceptedFiles: 'image/*',
    	 	// maxFilesize: 2,
    	 	paramName: 'photo',
    	 	headers: {
    	 		'X-CSRF-TOKEN': '{{ csrf_token() }}'
    	 	},
    	 	dictDefaultMessage: 'Arrastra las imagenes aqui para subirlas'
    	 });

    	 myDropzone.on('error', function(file, res){
    	 	var msg = res.photo[0];
    	 	$('.dz-error-message > span').text(msg);
    	 });
    	 Dropzone.autoDiscover = false;
	</script>
@endpush