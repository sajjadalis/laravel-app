<section class="probootstrap-cover profile cover-image" style='background: url("{{ asset('storage/profile') }}/{{$user->cover_image}}")'>
    <div class="cover-overlay"></div>
    <div class="container">
        <div class="row probootstrap-vh-60 text-left align-items-center">
            <div class="col-sm">
                
                <div class="probootstrap-text">
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $user->id)
                            <a href="{{$user->url}}/edit" class="btn btn-primary float-right">Edit</a>
                        @endif
                    @endif
                    <h1 class="probootstrap-heading text-white mb-4">{{$user->name}}</h1>
                    <div class="probootstrap-subheading mb-5">
                        <p class="h4 font-weight-normal">{{$user->occupation}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>