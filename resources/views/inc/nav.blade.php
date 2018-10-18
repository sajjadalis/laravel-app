<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top probootstrap-navabr-dark">
        <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="probootstrap-nav">
            <!-- Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/" class="nav-link {{ active_check('/') }}">{{ __('Home') }}</a></li>
                        <!-- Pages Nav Loop -->
                        <?php $pages = App\Page::all(); ?>
                        @if( $pages->count() )
                            @foreach($pages as $page)
                                <li class="nav-item">
                                    <a href="{{$page->url}}" class="nav-link {{ (strpos($_SERVER['REQUEST_URI'], str_slug($page->title)) !== false) ? 'active' : '' }}">{{ __($page->title) }}</a>
                                </li>
                            @endforeach
                        @endif

                      <li class="nav-item"><a href="/blog" class="nav-link {{ active_check(['blog*', 'post*']) }}">{{ __('Blog') }}</a></li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item probootstrap-cta probootstrap-seperator">
                        <a class="nav-link {{ active_check('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item probootstrap-cta">
                        @if (Route::has('register'))
                            <a class="nav-link {{ active_check('register') }}" href="{{ route('register') }}">{{ __('Signup') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown probootstrap-seperator">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle {{ active_check('dashboard') }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ Auth::user()->url }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('cp.dashboard') }}">
                                {{ __('Dashboard') }}
                             </a>
                            <a class="dropdown-item" href="/pages/create">
                                {{ __('Add New Page') }}
                            </a>
                             <a class="dropdown-item" href="/blog/create">
                                {{ __('Add New Post') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('cp.settings') }}">
                                {{ __('Settings') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>