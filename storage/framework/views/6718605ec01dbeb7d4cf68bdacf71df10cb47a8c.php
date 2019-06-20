<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <form method="POST" action="<?php echo e(route('admin.posts.store')); ?>">
    <?php echo e(csrf_field()); ?>


    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agrega el titulo de tu nueva publicación </h4>
        </div>
        <div class="modal-body">
          <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
            
            <input name="title" 
            class="form-control" 
            placeholder="Ingrese aqui el titulo de la publicación" required 
            value="<?php echo e(old('title')); ?>">
            <?php echo $errors->first('title', '<span class="help-block">:message</span>'); ?>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button class="btn btn-primary">Crear Publicacion</button>
        </div>
      </div>
    </div>

  </form>

</div><?php /**PATH /home/wichi/Documentos/Proyectos/RedSocial/resources/views/admin/publicaciones/create.blade.php ENDPATH**/ ?>