<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="content-vh100">


        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">

                    <div class="logo_laravel">
                        {{-- <img src="{{ asset('resources/img/logo.png') }}" alt=""> --}}

                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item bg-badge rounded-3 m-1 ancor-costum">
                            <a class="nav-link rounded-3 p-1" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ancor-costum">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item  bg-badge rounded-3 me-1">
                                <a class="nav-link rounded-3 p-1  fit-content"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item bg-badge rounded-3 ms-1">
                                    <a class="nav-link rounded-3 p-1  fit-content"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown bg-badge rounded-3 m-1">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle rounded-3 p-1  fit-content"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                    style="width: 120px;">
                                    <a class="dropdown-item rounded-3 my-1 fit-content"
                                        href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                                    {{-- <a class="dropdown-item rounded-3 my-1" href="{{ url('profile') }}">{{__('Profile')}}</a> --}}
                                    <a class="dropdown-item rounded-3  my-1  fit-content" href="{{ route('logout') }}"
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

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
</body>

</html>
