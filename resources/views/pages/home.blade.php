@extends('layouts.app')

@section('title')
    <section class="probootstrap-cover">
        <div class="container">
            <div class="row probootstrap-vh-100 text-center align-items-center">
                <div class="col-sm">
                    <div class="probootstrap-text">
                        <h1 class="probootstrap-heading text-white mb-4">{{$title}}</h1>
                        <div class="probootstrap-subheading mb-5">
                            <p class="h4 font-weight-normal">{{$subtitle}}</p>
                        </div>
                        @guest
                            <p><a href="/login" class="btn btn-primary mr-2 mb-2">Login</a><a href="/register" class="btn btn-primary btn-outline-white mb-2">Join Now</a></p>
                        @else
                            <h3 class="text-white">Welcome Back <a href="{{ Auth::user()->url }}" class="text-white">{{ Auth::user()->name }}</a></h3>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
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

<h2>{{ __('Recent Posts') }}</h2>
    @if( $posts->count() )
        <div class="card-deck">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-img">
                        <a href="{{$post->url}}"><img class="card-img-top" src="/storage/featured_images/{{ $post->featured_image }}" alt="{{ $post->title }}"></a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{$post->url}}">{{ $post->title }}</a></h5>
                        <p class="card-text">
                            <?php echo str_limit($post->body, 200,'...'); ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Created at {{ $post->created_at->format("F j, Y") }} - <a href="/blog/{{$post->id}}#disqus_thread" class="text-secondary">Leave a Comment</a></small>
                    </div>
                </div>
            @endforeach
        </div>
    
    @else
        <p>No posts found</p>
    @endif


@endsection