<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li <?php echo e(request()->is('admin') ? 'class=active' : ''); ?>>
    <a href="<?php echo e(route('dashboard')); ?>">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>

  <li class=" <?php echo e(request()->is('admin/posts*') ? 'active' : ''); ?> treeview">
    <a href="#"><i class="fa fa-link"></i> <span>Publicaciones</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>

    <ul class="treeview-menu">
      <li <?php echo e(request()->is('admin/posts') ? 'class=active' : ''); ?> ><a href="<?php echo e(route('admin.posts.index')); ?>"><i class="fa fa-eye"></i>Ver Publicaciones</a></li>

      <li <?php echo e(request()->is('admin/posts/create') ? 'class=active' : ''); ?> ><a href="<?php echo e(route('admin.posts.create')); ?>"><i class="fa fa-pencil"></i>Crear Publicación</a></li>
    </ul>
  </li>
</ul><?php /**PATH /home/wichi/Documentos/Proyectos/RedSocial/resources/views/admin/partials/nav.blade.php ENDPATH**/ ?>