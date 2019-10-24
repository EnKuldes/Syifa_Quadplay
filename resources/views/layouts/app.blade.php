<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        {{-- Fonts --}}
        <link href="{{ asset('css/css-nunito.css') }}" rel="stylesheet">
        <link href='{{ asset('css/css-family-ubuntu.css') }}' rel='stylesheet' type='text/css'>

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/uniform/css/uniform.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/waves/waves.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/slidepushmenus/css/component.css') }}" rel="stylesheet">

        {{-- Theme Styles --}}
        <link href="{{ asset('css/modern.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" defer></script>
        <script src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}" defer></script>
        <script src="{{ asset('plugins/3d-bold-navigation/js/modernizr.js') }}" defer></script>
        <script src="{{ asset('plugins/pace-master/pace.min.js') }}" defer></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('plugins/switchery/switchery.min.js') }}" defer></script>
        <script src="{{ asset('plugins/classie/classie.js') }}" defer></script>
        <script src="{{ asset('plugins/waves/waves.min.js') }}" defer></script>
        <script src="{{ asset('plugins/3d-bold-navigation/js/main.js') }}" defer></script>
        <script src="{{ asset('js/modern.min.js') }}" defer></script>
    </head>
    <body class="page-header-fixed compact-menu page-horizontal-bar">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
            @auth
                <div class="navbar">
                    <div class="navbar-inner container">
                        <div class="sidebar-pusher">
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        <div class="logo-box">
                            <a href="/" class="logo-text"><span>{{ config('app.name') }}</span></a>
                        </div>{{-- Logo Box --}}
                        <div class="topmenu-outer">
                            <div class="top-menu">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                            <span class="user-name">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></span>
                                            <img class="img-circle avatar" src="{{ asset('images/avatar1.png') }}" width="40" height="40" alt="">
                                        </a>
                                        <ul class="dropdown-menu dropdown-list" role="menu">
                                            <li role="presentation"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out m-r-xs"></i>{{ __('Logout') }}</a></li>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                </ul>{{-- Nav --}}
                            </div>{{-- Top Menu --}}
                        </div>
                    </div>
                </div>
            @endauth
            @auth
                {{-- Navbar Start --}}
                @include('inc.navbar')
                {{-- Navbar End --}}
            @endauth
                
            {{--  Page Sidebar --}}   
            <div class="page-inner">
                @auth
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb container">
                            <li><a href="/">{{ config('app.name') }}</a></li>
                            @foreach (Request::segments() as $record)
                                <li><a href="#">{{ ucwords($record) }}</a></li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="page-title">
                        <div class="container">
                            <h3>{{ ucwords(request()->segment(count(request()->segments()))) }}</h3>
                        </div>
                    </div>
                @endauth
                
                {{-- Main Wrapper Start --}}
                <div id="main-wrapper" class="container">
                    @yield('content')
                </div>
                {{-- Main Wrapper End --}}
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2019 &copy; Infomedia.</p>
                    </div>
                </div>
            </div>{{-- Page Inner End --}}
        </main>{{-- Page Content End --}}
        <div class="cd-overlay"></div>
</html>
