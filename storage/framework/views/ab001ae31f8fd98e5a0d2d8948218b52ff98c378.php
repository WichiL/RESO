<?php $__env->startSection('content'); ?>

<h1>Dashboard</h1>
<p>Usuario: <?php echo e(auth()->user()->name); ?></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wichi/Documentos/Proyectos/RedSocial/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>