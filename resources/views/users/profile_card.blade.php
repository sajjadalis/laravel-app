<div class="profile-card hovercard">
    <div class="profile-cardheader">
        <img alt="" src="{{ asset('storage/profile') }}/{{$user->picture}}">
    </div>
    <div class="info">
        @if(!empty($user->about))
        <div class="title">
            <h4>About:</h4>
        </div>
        <div class="desc">
            <p>{{str_limit($user->about, 220,'...')}}</p>
            <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">Read more &rarr;</a>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>About {{$user->name}}</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <p>{{ $user->about }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="info">
        <div class="info-item">
            Blog Posts:
            <span class="float-right">{{$user->posts->count()}}</span>
        </div>
        @if(!empty($user->gender))
            <div class="info-item">
                Gender:
                <span class="float-right">{{ucfirst($user->gender)}}</span>
            </div>
        @endif
        @if(!empty($user->phone_number))
            <div class="info-item">
                Phone:
                <span class="float-right">{{$user->phone_number}}</span>
            </div>
        @endif
        @if(!empty($user->city))
            <div class="info-item">
                City:
                <span class="float-right">{{$user->city}}</span>
            </div>
        @endif
        @if(!empty($user->country))
            <div class="info-item">
                Country:
                <span class="float-right">{{$user->country}}</span>
            </div>
        @endif
    </div>       
    <div class="bottom">
        @if(!empty($user->website))
            <a class="btn btn-primary btn-twitter btn-sm" href="{{$user->website}}"><i class="fas fa-globe"></i></a>
        @endif
        @if(!empty($user->twitter))
            <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/{{$user->twitter}}"><i class="fab fa-twitter"></i></a>
        @endif
        @if(!empty($user->facebook))
            <a class="btn btn-primary btn-sm" rel="publisher" href="https://plus.google.com/{{$user->facebook}}"><i class="fab fa-facebook-f"></i></a>
        @endif
        @if(!empty($user->google_plus))
        <a class="btn btn-primary btn-sm" rel="publisher" href="https://plus.google.com/+{{$user->linkedin}}"><i class="fab fa-google-plus-g"></i></a>
        @endif
        @if(!empty($user->linkedin))
            <a class="btn btn-primary btn-sm" rel="publisher" href="https://plus.google.com/{{$user->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
        @endif
    </div>
</div>