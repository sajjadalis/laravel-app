@extends('layouts.app')

@section('title')
    <div class="col-sm">
        <div class="probootstrap-text">
            <h1 class="probootstrap-heading text-white mb-4">{{$title}}</h1>
            <div class="probootstrap-subheading mb-5">
                <p class="h4 font-weight-normal">{{$subtitle}}</p>
            </div>
            <p><a href="/login" class="btn btn-primary mr-2 mb-2">Login</a><a href="/register" class="btn btn-primary btn-outline-white mb-2">Join Now</a></p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="media mb-md-0 mb-3">
            <div class="probootstrap-icon"><span class="icon-fingerprint display-4"></span></div>
            <div class="media-body">
                <h5 class="mt-0">Free Bootstrap 4</h5>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="media mb-md-0 mb-3">
            <div class="probootstrap-icon"><span class="icon-users display-4"></span></div>
            <div class="media-body">
                <h5 class="mt-0">For The Community</h5>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="media mb-md-0 mb-3">
            <div class="probootstrap-icon"><span class="icon-chat display-4"></span></div>
            <div class="media-body">
                <h5 class="mt-0">Support Us By Sharing This to Others</h5>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            </div>
        </div>
    </div>
@endsection