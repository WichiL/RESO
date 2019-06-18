<div class="buttons-social-media-share"> 
  <ul class="share-buttons">
    <li>
      <a href="https://www.facebook.com/sharer.php?u=<?php echo e(request()->fullUrl()); ?>&title=<?php echo e($description); ?>"
        title="Compartir en Facebook"
        target="_blank">
        <img alt="Share on Facebook" src="/img/flat_web_icon_set/Facebook.png">
      </a>
    </li>

    <li>
      <a href="https://twitter.com/intent/tweet?url=<?php echo e(request()->fullUrl()); ?>&text=<?php echo e($description); ?>&via=admin&hashtags=RedSocial
" 
        target="_blank" 
        title="Tweet">
        <img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png">
      </a>
    </li>
              
    <li>
      <a href="http://pinterest.com/pin/create/button/?url=&description=" 
        target="_blank" 
        title="Pin it">
        <img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png">
      </a>
    </li>
  </ul>
</div><?php /**PATH /home/wichi/Documentos/Proyectos/RedSocial/resources/views/partials/social-links.blade.php ENDPATH**/ ?>