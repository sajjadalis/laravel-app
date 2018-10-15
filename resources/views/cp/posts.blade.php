@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">Posts</h1>
            <div class="probootstrap-subheading mb-5">
                <p class="h4 font-weight-normal">control your stuff here</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            @include('cp.sidemenu')

        </div>
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th  class="w-75">Post Title</th>
                        <th  class="w-25">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($posts->count())
                            @foreach($posts as $post)

                            <tr>
                                <td class="w-75"><a href="{{$post->url}}">{{$post->title}}</a></td>
                                <td class="w-25">
                                    <a href="{{$post->url}}/edit" class="btn btn-primary btn-sm float-left">{{ __('Edit' )}}</a>

                                    {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'onsubmit' => 'return confirm_delete()'])!!}
                                    {!!Form::hidden('_method', 'DELETE')!!}
                                    {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm float-left'])!!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                                <td class="col col-sm-12">You don't have any posts</td>
                        </tr>
                        @endif

                    </tbody>
                </table>

                {{$posts->links()}}
                        
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection