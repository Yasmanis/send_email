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
   
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('plantilla/assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('pantilla/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('plantilla/assets/images/logo.png') }}"></a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                                <li class="dropdown">
                                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                        {{-- <span>2</span> --}}
                                    </i>
                                </li>
                                <li class="dropdown">
                                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"></i>
                                    
                                </li>
                               
                            </ul>
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="{{ asset('plantilla/assets/images/author/avatar.png') }}" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notificaciones</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        
        <!-- page title area end -->
        <div class="main-content-inner">
            <div class="container">
                @yield('main_content')
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
    <!-- offset area start -->
    <div class="offset-area">
        @yield('offet_area')
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{ asset('plantilla/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('plantilla/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/jquery.slicknav.min.js') }}"></script>


    <script src="{{ asset('plantilla/assets/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('plantilla/assets/js/pie-chart.js') }}"></script>
    <!-- all bar chart -->
    <script src="{{ asset('plantilla/assets/js/bar-chart.js') }}"></script>
    <!-- all map chart -->
    <script src="{{ asset('plantilla/assets/js/maps.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('plantilla/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('plantilla/assets/js/scripts.js') }}"></script>
</body>
</html>
