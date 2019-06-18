<?php $__env->startSection('content'); ?>

    <section class="posts container">
        
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="post no-image">
            <div class="content-post">
                <header class="container-flex space-between">
                    <div class="date">
                        <span class="c-gray-1"><?php echo e($post->published_at->format('M d')); ?></span>
                    </div>
                    <div class="post-category">
                        <span class="category text-capitalize"><?php echo e($post->category->name); ?></span>
                    </div>
                </header>
                <h1><?php echo e($post->title); ?></h1>
                <div class="divider"></div>
                <p><?php echo e($post->excerpt); ?></p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <a href="convocatorias/<?php echo e($post->url); ?>" class="text-uppercase c-green">Abrir Convocatoria</a>
                    </div>
                    <div class="tags container-flex">
                        <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag c-gray-1 text-capitalize">#<?php echo e($tag->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </footer>
            </div>
        </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





    </section><!-- fin del div.posts.container -->

    <div class="pagination">
        <ul class="list-unstyled container-flex space-center">
            <li><a href="#" class="pagination-active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wichi/Documentos/Proyectos/RedSocial/resources/views/welcome.blade.php ENDPATH**/ ?>