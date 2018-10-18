@extends('layouts.app')

@section('title')
    <section class="probootstrap-cover">
        <div class="container">
            <div class="row probootstrap-vh-60 text-left align-items-center">
                <div class="col-sm">
                    <div class="probootstrap-text">
                        <h1 class="probootstrap-heading text-white mb-4">{{$title}}</h1>
                        <div class="probootstrap-subheading mb-5">
                            <p class="h4 font-weight-normal">{{$subtitle}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    {!!$body!!}
@endsection