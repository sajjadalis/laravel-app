@extends('layouts.app')
@section('title')
    @include('users.profile_header')
@endsection
@section('content')

<div class="row profile">
    <div class="col col-sm-4">
        @include('users.profile_card')
    </div>

    <div class="col col-sm-8">
        <div class="ml-5">
            <h2>Recent Posts</h2>

            @if($user->posts->count())
                @foreach($user->posts as $post)
                    <div class="post">
                        <div class="profile-blog-img float-left">
                            <img src="{{ asset('storage/featured_images').'/'.$post->featured_image }}">
                        </div>
                        <h4><a href="{{$post->url}}">{{$post->title}}</a></h4>
                        <div class="excerpt">
                            {!! str_limit($post->body, 220,'...') !!}
                        </div>
                        <p class="h6 font-weight-normal">
                            <i class="fa fa-clock"></i> {{ $post->created_at->diffForHumans() }} &nbsp;
                            <i class="fa fa-comment"></i> <a href="#disqus_thread" class="text-dark">Leave a Comment</a> &nbsp;
                            <a href="{{ $post->url . '/heart' }}" class="far fa-heart like-article js-like-article text-dark" ></a>
                            <span class="js-like-article-count">5</span>
                        </p>
                    </div>
                @endforeach
            @else
                    <p>You don't have any blog post</p>
            @endif

        </div>
    </div>

</div>

@endsection