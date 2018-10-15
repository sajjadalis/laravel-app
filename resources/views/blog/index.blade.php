@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">{{$title}}</h1>
            <div class="probootstrap-subheading mb-5">
                <p class="h4 font-weight-normal">{{$subtitle}}</p>
            </div>
        </div>
    </div>
@endsection
@section('content')

    @if( $posts->count() )
        <div class="card-columns">
            @foreach($posts as $post)
                <div class="card">
                        <div class="card-img">
                                <a href="{{$post->url}}"><img class="card-img-top" src="/storage/featured_images/{{ $post->featured_image }}" alt="{{ $post->title }}"></a>
                            </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{$post->url}}">{{ $post->title }}</a></h5>
                        <p class="card-text">
                            <?php echo str_limit($post->body, 200,'...'); ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Created at {{ $post->created_at->format("F j, Y") }} - <a href="/blog/{{$post->id}}#disqus_thread" class="text-secondary">Leave a Comment</a></small>
                    </div>
                </div>
            @endforeach
        </div>

        {{$posts->links()}}
    
    @else
        <p>No posts found</p>
    @endif

@endsection