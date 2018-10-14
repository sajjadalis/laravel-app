@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">Dashboard</h1>
            <div class="probootstrap-subheading mb-5">
                <p class="h4 font-weight-normal">control your stuff here</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pages</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($pages) > 0)
                        @foreach($pages as $page)
                            <a href="{{$page->url}}">{{$page->title}}</a>
                            
                            {!!Form::open(['action' => ['PageController@destroy', $page->id], 'method' => 'POST', 'onsubmit' => 'return confirm_delete()', 'class' => 'float-right'])!!}
                            {!!Form::hidden('_method', 'DELETE')!!}
                            {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm float-right'])!!}
                            {!! Form::close() !!}

                            <a href="{{$page->url}}/edit" class="btn btn-primary btn-sm float-right">{{ __('Edit' )}}</a>
                            <hr>
                        @endforeach
                    @else
                        <p>You don't have any pages</p>
                    @endif
                    
                </div>
            </div>
            <br />
            <div class="card">
                    <div class="card-header">Posts</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <a href="{{$post->url}}">{{$post->title}}</a>
                                
                                {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'onsubmit' => 'return confirm_delete()', 'class' => 'float-right'])!!}
                                {!!Form::hidden('_method', 'DELETE')!!}
                                {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm float-right'])!!}
                                {!! Form::close() !!}
    
                                <a href="{{$post->url}}/edit" class="btn btn-primary btn-sm float-right">{{ __('Edit' )}}</a>
                                <hr>
                            @endforeach
                        @else
                            <p>You don't have any posts</p>
                        @endif
                        
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
