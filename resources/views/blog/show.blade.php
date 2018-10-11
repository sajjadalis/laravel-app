@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">{{$post->title}}</h1>
            <div class="probootstrap-subheading mb-5">
                <p class="h6 font-weight-normal">Created at {{ $post->created_at->format("F j, Y, g:i a") }}</p>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <p>{!! $post->body !!}</p>

    <hr>

    <a href="/blog" class="btn btn-default mr-2 mb-2">Back to All Posts</a>
    <a href="/blog/{{$post->id}}/edit" class="btn btn-primary mb-2">Edit</a>
    {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {!!Form::hidden('_method', 'DELETE')!!}
        {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
    {!! Form::close() !!}
    

@endsection