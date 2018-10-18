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

    {!! Form::open(['action' => 'PageController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::text('subtitle', '', ['class' => 'form-control', 'placeholder' => 'Subtitle'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('body', '', ['id' => 'editor', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}

@endsection