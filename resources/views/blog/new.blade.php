@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">{{$title}}</h1>
        </div>
    </div>
@endsection
@section('content')

    {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::textarea('body', '', ['id' => 'editor', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::file('featured_image')}}
        </div>
        <div class="form-group">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}

@endsection