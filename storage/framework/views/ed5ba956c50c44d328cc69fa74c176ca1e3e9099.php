<?php $__env->startSection('header'); ?>
	<h1>
		POSTS
        <small>Crear Publicación</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="<?php echo e(route('admin.posts.index')); ?>"><i class="fa fa-list"></i> Publicaciones</a></li>
      <li class="active">Crear</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<form method="POST" action="<?php echo e(route('admin.posts.update', $post)); ?>">
		<?php echo e(csrf_field()); ?> <?php echo e(method_field('PUT')); ?>		
		<div class="col-md-8">
			<div class="box box-primary">
			    
			   		<div class="box-body">
			   			<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
			   				<label>Titulo de la Publicación</label>
			   				<input name="title" class="form-control" placeholder="Ingrese aqui el titulo de la publicación"
			   				value="<?php echo e(old('title', $post->title)); ?>">
			   				<?php echo $errors->first('title', '<span class="help-block">:message</span>'); ?>

			   			</div>

			    		<div class="form-group <?php echo e($errors->has('body') ? 'has-error' : ''); ?>">
			    			<label>Contenido de la publicación</label>
			    			<textarea id="editor" rows="10" name="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación..."><?php echo e(old('body', $post->body)); ?></textarea>
			    			<?php echo $errors->first('body', '<span class="help-block">:message</span>'); ?>

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
			                value="<?php echo e(old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null)); ?>">
			            </div>
			        </div>	
			        <div class="form-group <?php echo e($errors->has('category') ? 'has-error' : ''); ?>" >
			        	<label>Categorias</label>
			        	<select name="category" class="form-control">
			        		<option value="">Selecciona una categoria</option>
			        		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        			<option value="<?php echo e($category->id); ?>"
			        			 <?php echo e(old('category', $post->category_id) == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
			        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        	</select>
			        	<?php echo $errors->first('category', '<span class="help-block">:message</span>'); ?>

			        </div>	

					<div class="form-group <?php echo e($errors->has('tags') ? 'has-error' : ''); ?>">
						<label>Etiquetas</label>
						<select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o más etiquetas"
                        style="width: 100%;">
		             	<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		             		<option <?php echo e(collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''); ?> value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
		             	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                </select><?php echo $errors->first('tags', '<span class="help-block">:message</span>'); ?>

					</div>

			    	<div class="form-group <?php echo e($errors->has('excerpt') ? 'has-error' : ''); ?>">
			    		<label>Extracto de la publicación</label>
			    		<textarea name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación..."><?php echo e(old('excerpt', $post->excerpt)); ?></textarea>
			    		<?php echo $errors->first('excerpt', '<span class="help-block">:message</span>'); ?>

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


<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" href="/adminLTE/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="/adminLTE/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
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
    	 	url: '/admin/posts/<?php echo e($post->url); ?>/photos',
    	 	acceptedFiles: 'image/*',
    	 	maxFilesize: 2,
    	 	paramName: 'foto',
    	 	headers: {
    	 		'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
    	 	},
    	 	dictDefaultMessage: 'Arrastra las imagenes aqui para subirlas'
    	 });

    	 myDropzone.on('error', function(file, res){

    	 	var msg = "La " + res.errors.foto[0];
    	 	$('.dz-error-message:last > span').text(msg);
    	 });

    	 Dropzone.autoDiscover = false;
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wichi/Documentos/Proyectos/RedSocial/resources/views/admin/publicaciones/edit.blade.php ENDPATH**/ ?>