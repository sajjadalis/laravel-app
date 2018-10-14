@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">Edit Page</h1>
        </div>
    </div>
@endsection
@section('content')

    {!! Form::open(['action' => ['PageController@update', $page->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::text('title', $page->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::text('subtitle', $page->subtitle, ['class' => 'form-control', 'placeholder' => 'Subtitle'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('body', $page->body, ['id' => 'editor', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}

@endsection