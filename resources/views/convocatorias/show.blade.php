@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')

<article class="post container">
    @if ($post->photos->count() === 1)
      <figure><img src="{{ $post->photos->first()->url }}" alt="" class="img-responsive"></figure> 
    @elseif($post->photos->count() > 1)
      @include('convocatorias.carousel') 
    @elseif($post->iframe)
      <div class="video">
         {!! $post->iframe !!}
      </div>
    @endif

    

    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{ $post->published_at->format('M d') }}</span>
        </div>
        <div class="post-category">
          <span class="category">{{ $post->category->name}}</span>
        </div>
      </header>
      <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
          <div>
            {!! $post->body !!}
          </div>
        </div>

        <footer class="container-flex space-between">
          @include('partials.social-links', ['description' => $post->title])

          <div class="tags container-flex">
            @foreach($post->tags as $tag)
                <span class="tag c-gray-1 text-capitalize">#{{ $tag->name }}</span>
            @endforeach
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
		
          @include('partials.disqus-script')                  
      </div><!-- .comments -->
    </div>
  </article>

@stop

@push('styles')
  <link rel="stylesheet" type="text/css" href="/css/twitter-bootstrap.css">  
  <link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet">
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
@endpush

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script id="dsq-count-scr" src="/js/twitter-bootstrap.js " async></script>
    <script src='https://vjs.zencdn.net/7.5.5/video.js'></script>
@endpush




