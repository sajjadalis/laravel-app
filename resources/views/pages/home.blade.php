@extends('layouts.app')

@section('content')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">{{$title}}</h1>
            <div class="probootstrap-subheading mb-5">
                <p class="h4 font-weight-normal">First Try to Get Things Done Smoothly</p>
            </div>
            <p><a href="/login" class="btn btn-primary mr-2 mb-2">Login</a><a href="/register" class="btn btn-primary btn-outline-white mb-2">Join Now</a></p>
        </div>
    </div>
@endsection