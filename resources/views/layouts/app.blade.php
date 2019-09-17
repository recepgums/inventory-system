<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
</head>
<body class="fix-header fix-sidebar card-no-border">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
            <div class="navbar-header">
                @if(Auth::user())
                <a class="navbar-brand" href="{{route('home')}}">
                    <!-- Logo icon -->
                    <b>
                        <img src="{{asset('images/logo-icon.png')}}" alt="homepage" class="dark-logo" />

                    </b>
                    <span>
                            <img src="{{asset('images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                    </span>
                </a>
                    @endif
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0 ">
                    <!-- This is  -->
                    @if(Auth::user())
                        <li class="nav-item hidden-sm-down">
                            @yield('search')

                        </li>
                    @endif
                </ul>
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
                        <a  style="color:white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            </div>
        </nav>
    </header>
</div>
@if(Auth::user())
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{route('show_staff')}}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Personeller</a>
                </li>

                <li>
                    <a href="{{route('show_inventory')}}" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Envanter</a>
                </li>

                @if(auth()->user()->role_id <= 2)
                    <li>
                        <a href="{{route('show_fault')}}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Arızalar</a>
                    </li>
                    <li>
                    <li>
                        <a href="{{route('show_tasks')}}" class="waves-effect"><i class="fa fa-bank m-r-10" aria-hidden="true"></i>Yetkiler</a>
                    </li>
                @endif
                <li>
                    <a href="{{route('show_assignment_tasks')}}" class="waves-effect"><i class="fa fa-dashboard m-r-10" aria-hidden="true"></i>Yetki Ataması</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
@endif
    <div id="app"><br>
        @if(Auth::user())
        @yield('content')
        @endif
    </div>

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/tether.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/waves.js')}}"></script>
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <script src="{{asset('plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('plugins/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/flot-data.js')}}"></script>
    <script src="{{asset('plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>
</html>
