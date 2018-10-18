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
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
                @include('cp.sidemenu')
        </div>
                
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Activity</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>You don't have any activity yet</p>
                        
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection