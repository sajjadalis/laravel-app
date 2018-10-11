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

    @if(count($posts) > 0)

    <div class="card-deck">
        @foreach($posts as $post)
            <div class="card">
                <img class="card-img-top" src="/storage/images/{{ $post->featured_image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a href="/blog/{{$post->id}}">{{ $post->title }}</a></h5>
                    <p class="card-text">
                        <?php echo str_limit($post->body, 600,'...'); ?>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Created at: {{ $post->created_at }} & Last updated: {{ $post->updated_at }}</small>
                </div>
            </div>
        @endforeach
    </div>
    
    @else
        <p>No posts found</p>
    @endif

@endsection