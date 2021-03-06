<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav nav-pills">
                        <li class="nad-item">
                            <a class="nav-link {{ (\Request::is('data*')) ? 'active' : '' }}" href="{{ url('/') }}/data">Preview</a>
                        </li>
                        @auth
                            @foreach(App\Models\Page::all() as $page)
                                <li class="nad-item">
                                    <a class="nav-link {{ (\Request::is('page/'.$page->id )) ? 'active' : '' }}" href="{{ url('/') }}/page/{{ $page->id }}">{{ $page->name }}</a>
                                </li>
                            @endforeach
                            <li class="nad-item">
                                <a class="nav-link {{ (\Request::is('home')) ? 'active' : '' }}" href="{{ url('/') }}/home">Settings</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @auth
                @if( Auth::user()->is_admin == 1 )
                    @yield('content')
                @else
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6 alert alert-warning text-center">
                                Nemate ovlascenje za koriscenje sistema.<br>Ukoliko smatrate da je to greska molimo da se obratite administratoru.
                                <hr>
                                You don't have enough privileges to administer this system. If you believe this is an error please contact the Administrator.
                            </div>
                        </div>
                    </div>
                @endif
            @endauth

            @guest
                @if(\Request::is('login') || \Request::is('register') || \Request::is('data*'))
                    @yield('content')
                @endif
            @endguest
        </main>
    </div>
    @yield('scripts')
</body>
</html>
