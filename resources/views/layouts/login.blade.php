<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="shortcut icon" type="image/png" href="{{ asset('plantilla/assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('plantilla/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
 
    <!-- Scripts -->
   {{-- <!--   <script src="{{ asset('js/app.js') }}" ></script>--> --}}

    <!-- jquery latest version -->
    <script src="{{ asset('plantilla/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('plantilla/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/jquery.slicknav.min.js') }}"></script>
    
    <!-- others plugins -->
    <script src="{{ asset('plantilla/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/scripts.js') }}"></script>
</body>
</html>
