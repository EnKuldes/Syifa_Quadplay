<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Syifa Quadplay') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('plugins/3d-bold-navigation/js/modernizr.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
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

        <!-- Theme Styles -->
        <link href="{{ asset('css/modern.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="page-header-fixed compact-menu page-horizontal-bar">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner container">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="/" class="logo-text"><span>{{ config('app.name', 'Syifa Quadplay') }}</span></a>
                    </div><!-- Logo Box -->
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name">David<i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="{{ asset('images/avatar1.png') }}" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <!--
                                        <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendar</a></li>
                                        <li role="presentation"><a href="inbox.html"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
                                        -->
                                        <li role="presentation"><a href="login.html"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div>
            <!-- Navbar Start -->
            @include('inc.navbar')
            <!-- Navbar End -->
            <!-- Page Sidebar -->   
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Layouts</a></li>
                        <li class="active">Blank Page</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Blank Page</h3>
                    </div>
                </div>
                <!-- Main Wrapper Start --> 
                <div id="main-wrapper" class="container">
                    @yield('content')
                </div>
                <!-- Main Wrapper End -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2019 &copy; Infomedia.</p>
                    </div>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <div class="cd-overlay"></div>

        <!-- Javascripts -->
        <script src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}" defer></script>
        <script src="{{ asset('plugins/pace-master/pace.min.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js') }}" defer></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" defer></script>
        <script src="{{ asset('plugins/switchery/switchery.min.js') }}" defer></script>
        <script src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}" defer></script>
        <script src="{{ asset('plugins/classie/classie.js') }}" defer></script>
        <script src="{{ asset('plugins/waves/waves.min.js') }}" defer></script>
        <script src="{{ asset('plugins/3d-bold-navigation/js/main.js') }}" defer></script>
        <script src="{{ asset('js/modern.min.js') }}" defer></script>
</html>
