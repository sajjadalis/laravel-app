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
                        <th class="w-75">Page Title</th>
                        <th class="w-25">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pages->count())
                            @foreach($pages as $page)

                            <tr>
                                <td class="w-75"><a href="{{$page->url}}">{{$page->title}}</a></td>
                                <td class="w-25">
                                    <a href="{{$page->url}}/edit" class="btn btn-primary btn-sm float-left">{{ __('Edit' )}}</a>

                                    {!!Form::open(['action' => ['PageController@destroy', $page->id], 'method' => 'page', 'onsubmit' => 'return confirm_delete()'])!!}
                                    {!!Form::hidden('_method', 'DELETE')!!}
                                    {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm float-left'])!!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="2">You don't have any pages</td>
                        </tr>
                        @endif

                    </tbody>
                </table>

                {{$pages->links()}}
                        
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection