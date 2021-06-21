<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portal Absen</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #c9caca">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{asset('images/cropped-logo-jarvis-samping.png')}}" width="120"
                        class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span style="color: white">
                        <i class="fas fa-sliders-h"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" style="font-weight:bolder"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" style="font-weight:bolder"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-bold text-dark" style="font-weight: bolder"
                                href="{{route('data_user.index')}}">Data</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-bold text-dark"
                                style="font-weight: bolder" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('profil.index')}}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="py-4" style="background-color: #8c1212; min-height: 600px">
            @yield('content')
        </main>
    </div>

    @stack('javascript')
    @include('sweetalert::alert')


</body>

</html>