<nav class="navbar navbar-expand-lg navbar-dark bg-dark probootstrap-navabr-dark">
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
                      <li class="nav-item"><a href="/" class="nav-link {{ active_check('/') }}">Home</a></li>
                      <li class="nav-item"><a href="/about" class="nav-link {{ active_check('about') }}">About</a></li>
                      <li class="nav-item"><a href="/services" class="nav-link {{ active_check('services') }}">Services</a></li>
                      <li class="nav-item"><a href="/blog" class="nav-link {{ active_check('blog') }}">Blog</a></li>
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">
                                 {{ __('Dashboard') }}
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