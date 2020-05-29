@extends('layouts.app')

@section('title')
    <section class="probootstrap-cover cover-image" @if($post->featured_image != "noimage.jpg")style='background: url("/storage/featured_images/{{$post->featured_image}}")'@endif>
        @if($post->featured_image != "noimage.jpg")
            <div class="cover-overlay"></div>
        @endif    
        <div class="container">
            <div class="row probootstrap-vh-60 text-left align-items-center">
                <div class="col-sm">
                    <div class="probootstrap-text">
                        <h1 class="probootstrap-heading text-white mb-4">{{$post->title}}</h1>
                        <div class="probootstrap-subheading mb-5">
                        <p class="h6 font-weight-normal text-white">
                            <i class="fa fa-user"></i> <a href="{{ $post->user->url }}" class="text-white">{{$post->user->name}}</a> &nbsp;
                            <i class="fa fa-clock"></i> {{ $post->created_at->diffForHumans() }} &nbsp;
                            <i class="fa fa-comment"></i> <a href="#disqus_thread" class="text-white">Leave a Comment</a> &nbsp;
                            <a href="{{ $post->url . '/heart' }}" class="far fa-heart text-white like-article js-like-article" ></a>
                            <span class="js-like-article-count text-white">5</span>
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')

    {!! $post->body !!}

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <hr>
            <a href="{{$post->url}}/edit" class="btn btn-primary mb-2">Edit</a>
            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'onsubmit' => 'return confirm_delete()', 'class' => 'float-right'])!!}
                {!!Form::hidden('_method', 'DELETE')!!}
                {!!Form::submit('Delete', ['class' => 'btn btn-danger trigger-btn', 'data-toggle' => 'modal'])!!}
            {!! Form::close() !!}
        @endif
    @endif

    @include ('blog.comments')

@endsection