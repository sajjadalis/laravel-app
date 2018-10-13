@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">{{$post->title}}</h1>
            <div class="probootstrap-subheading mb-5">
            <p class="h6 font-weight-normal">Created at {{ $post->created_at->format("F j, Y, g:i a") }} by {{$post->user->name}} - <a href="#disqus_thread" class="text-white">Leave a Comment</a></p>
            </div>
        </div>
    </div>
@endsection
@section('content')
    
    @if($post->featured_image != "noimage.jpg")
        <img src="/storage/featured_images/{{$post->featured_image}}" class="img-fluid">
    @endif

    <p>{!! $post->body !!}</p>

    @if(!Auth::guest())
        <hr>
        <a href="/blog/{{$post->id}}/edit" class="btn btn-primary mb-2">Edit</a>
        {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {!!Form::hidden('_method', 'DELETE')!!}
            {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
        {!! Form::close() !!}
    @endif

    <hr>
    <h2><a href="#disqus_thread" class="text-dark">Comments</a></h2>
    <div id="disqus_thread"></div>

@endsection