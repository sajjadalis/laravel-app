@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">{{$page->title}}</h1>
            <div class="probootstrap-subheading mb-5">
                    <p class="h4 font-weight-normal">{{$page->subtitle}}</p>
                </div>
        </div>
    </div>
@endsection
@section('content')

    <p>{!! $page->body !!}</p>

    @if(!Auth::guest())
        @if(Auth::user()->id == $page->user_id)
            <hr>
            <a href="{{$page->url}}/edit" class="btn btn-primary mb-2">Edit</a>
            {!!Form::open(['action' => ['PageController@destroy', $page->id], 'method' => 'POST', 'onsubmit' => 'return confirm_delete()', 'class' => 'float-right'])!!}
                {!!Form::hidden('_method', 'DELETE')!!}
                {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
            {!! Form::close() !!}
        @endif
    @endif

@endsection