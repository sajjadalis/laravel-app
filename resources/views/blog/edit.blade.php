@extends('layouts.app')

@section('title')
    <section class="probootstrap-cover">
        <div class="container">
            <div class="row probootstrap-vh-60 text-left align-items-center">
                <div class="col-sm">
                    <div class="probootstrap-text">
                        <h1 class="probootstrap-heading text-white mb-4">{{$title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')

    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('body', $post->body, ['id' => 'editor', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('featured_image', 'Featured Image')}}
            <div class="custom-file">
                {{Form::file('featured_image', ['class' => 'custom-file-input'])}}
                {{Form::label('featured_image', 'Choose file', ['class' => 'custom-file-label featured-label'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}

@endsection