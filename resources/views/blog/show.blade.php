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

    <hr>
    @if ($post->comments->count())
    <h2>Comments ( {{$post->comments->count()}} )</h2>
    <hr>
    <div id="comments">
        @foreach ($post->comments as $comment)
            <div class="comment">
                <h3>{{$comment->name}} <small style="font-size: 16px;">( {{$comment->created_at->diffForHumans()}} )</small></h3>
                <p>{{$comment->body}}</p>
            </div>
        @endforeach
    </div>
    <br>
    @endif
    <h2>Leave a Comment</h2>
    <hr>
    <form action="/post/{{ $post->id }}/comments" method="post" class="probootstrap-form mb-5">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea rows="3" class="form-control" id="body" name="body"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Add Comment">
        </div>
        </form>

    {{-- <h2><a href="#disqus_thread" class="text-dark">Comments</a></h2>
    <div id="disqus_thread"></div> --}}

@endsection