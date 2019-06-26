<?php $__env->startSection('meta-title', $post->title); ?>
<?php $__env->startSection('meta-description', $post->excerpt); ?>

<?php $__env->startSection('content'); ?>

<article class="post container">
    <?php if($post->photos->count() === 1): ?>
        <figure><img src="<?php echo e($post->photos->first()->url); ?>" alt="" class="img-responsive"></figure>
    <?php endif; ?>
    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris"><?php echo e($post->published_at->format('M d')); ?></span>
        </div>
        <div class="post-category">
          <span class="category"><?php echo e($post->category->name); ?></span>
        </div>
      </header>
      <h1><?php echo e($post->title); ?></h1>
        <div class="divider"></div>
        <div class="image-w-text">
          <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
          <div>
            <?php echo $post->body; ?>

          </div>
        </div>

        <footer class="container-flex space-between">
          <?php echo $__env->make('partials.social-links', ['description' => $post->title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="tags container-flex">
            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="tag c-gray-1 text-capitalize">#<?php echo e($tag->name); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
		
          <?php echo $__env->make('partials.disqus-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                  
      </div><!-- .comments -->
    </div>
  </article>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wichi/Documentos/Proyectos/RedSocial/resources/views/convocatorias/show.blade.php ENDPATH**/ ?>