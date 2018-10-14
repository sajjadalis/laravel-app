@include('inc.header')
    <div id="app">
        @include('inc.nav')

        <section class="probootstrap-cover">
            <div class="container">
                <div class="row {{ Request::is('/') ? 'probootstrap-vh-100 text-center' : 'probootstrap-vh-60 text-left' }} align-items-center">
                    @yield('title')
                </div>
            </div>
        </section>

        <section class="probootstrap-section">
            <div class="container">
                @include('inc.messages')
                @yield('content')
            </div>
        </section>
    </div>

    @include('inc.footer')