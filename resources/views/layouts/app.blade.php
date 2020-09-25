{{-- THIS IS THE NAVIGATATION TOOLBAR, DON'T GET CONFUSE DAN, PLEASE! --}}


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 20;
        margin-left: -15px;
        margin-right: -15px;
    }

    /* Flip around the padding for proper display in narrow viewports */
    .navbar-wrapper .container {
        padding-left: 0;
        padding-right: 0;
    }

    .navbar-wrapper .navbar {
        padding-left: 15px;
        padding-right: 15px;
    }

    .navbar-content {
        width: 320px;
        padding: 15px;
        padding-bottom: 0px;
        display: block;
        margin: 0 auto;
    }

    .navbar-content:before,
    .navbar-content:after {
        display: table;
        content: "";
        line-height: 0;
    }

    .navbar-nav.navbar-right:last-child {
        margin-right: 15px !important;
    }

    .navbar-footer {
        position: relative;
        background-color: #DDD;
    }

    .navbar-footer-content {
        padding: 10px 10px 10px 10px;
    }

    .dropdown-menu {
        padding: 0px;
        overflow: none;
    }

    .brand_network {
        color: #9D9D9D;
        float: left;
        position: absolute;
        left: 70px;
        top: 30px;
        font-size: smaller;
    }

    .post-content {
        margin-left: 58px;
    }

    .badge-important {
        margin-top: 3px;
        margin-left: 25px;
        position: absolute;
    }

    #login-dp {
        min-width: 260px;
        padding: 14px 14px 0;
        overflow: hidden;
        background-color: rgba(255, 255, 255, 255);
    }

    #login-dp .help-block {
        font-size: 12px
    }

    #login-dp .bottom {
        background-color: rgba(255, 255, 255, 255);
        border-top: 1px solid #ddd;
        clear: both;
        padding: 14px;
    }

    #login-dp .social-buttons {
        margin: 12px 0
    }

    #login-dp .social-buttons a {
        width: 49%;
    }

    #login-dp .form-group {
        margin-bottom: 10px;
    }

    .btn-fb {
        color: #fff;
        background-color: #3b5998;
    }

    .btn-fb:hover {
        color: #fff;
        background-color: #496ebc
    }

    .btn-tw {
        color: #fff;
        background-color: #55acee;
    }

    .btn-tw:hover {
        color: #fff;
        background-color: #59b5fa;
    }

    @media(max-width:768px) {
        #login-dp {
            background-color: inherit;
            color: #fff;
        }

        #login-dp .bottom {
            background-color: inherit;
            border-top: 0 none;
        }
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="nav-link btn" href="/"><b>Home</b> <span class="sr-only">(current)</span></a>
                        <li class="nav-item">
                            <a type="button" class="nav-link btn" href="/posts"><b>Posts</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="/about"><b>About Us</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="/contactus"><b>Contact Us</b></a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Authentication Links -->
                            <li class="dropdown mt-2">
                                <a href="#" type="button" class="nav-link btn" data-toggle="dropdown"><b>Login</b>
                                    <span class="caret"></span></a>
                                <ul id="login-dp" class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Login via
                                                <div class="social-buttons">
                                                    <a href="#" class="btn btn-fb"><i class="fab fa-facebook"></i>
                                                        Facebook</a>
                                                    <a href="#" class="btn btn-tw"><i class="fab fa-twitter"></i>
                                                        Twitter</a>
                                                </div>
                                                or
                                                <form class="form" role="form" method="post" action="login"
                                                    accept-charset="UTF-8" id="login-nav">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email
                                                            address</label>
                                                        <input type="email" name="email" class="form-control" id="email"
                                                            placeholder="Email address" required="" autofocus>

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only"
                                                            for="exampleInputPassword2">Password</label>
                                                        <input type="password" name="password" class="form-control"
                                                            @error('password') is-invalid @enderror" id="password"
                                                            placeholder="Password" required="">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                        <div class="help-block text-right">
                                                            <a href="{{ route('password.request') }}">
                                                                Forget Password?</a>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">Sign
                                                            in</button>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> Keep me logged-in
                                                            </input>
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="bottom text-center">
                                                New here ? <a href="#"><b>Join Us</b></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item mt-2">
                                <a style="color:white;" class="nav-link btn btn-success btn-sm ml-1" type="button"
                                    href="{{ route('register') }}"><b>{{ __('Register') }}</b></a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link btn" href="#" id="dropdown01" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle" width="33" title=" {{ Auth::user()->name }} "
                                        src="/storage/avatars/{{Auth::user()->avatar}}" /></a>

                                {{-- DROPDOWN CONTENT --}}
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div align="center" class="navbar-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <center><img src="/storage/avatars/{{Auth::user()->avatar}}"
                                                        alt="Alternate Text" class="img-responsive" width="120px"
                                                        height="120px" /></center>
                                                <p class="text-center small" data-target="#demo">
                                                    <a href="">Change Photo</a></p>
                                            </div>
                                            <div class="col-md-7">
                                                <center><span> {{ Auth::user()->name }} </span></center>
                                                <center>
                                                    <p class="text-muted small">{{ Auth::user()->email }} </p>
                                                </center>
                                                <div class="divider">
                                                </div>
                                                <center><a href="/dashboard/{{ Auth::user()->username}}"
                                                        class="btn btn-outline-secondary btn-sm mb-2 pl-4 pr-4"><i
                                                            class="fa fa-user" aria-hidden="true"></i> My Profile</a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-footer">
                                        <div class="navbar-footer-content">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-cogs"
                                                            aria-hidden="true"></i>
                                                        Settings</a>
                                                </div>
                                                <div class="col">
                                                    <a class=" btn btn-danger btn-sm float-right"
                                                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                                        {{ __('Sign Out') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endguest
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        @include('include.messages')
        @yield('content')
    </div>
</body>
@yield('footer')

</html>

{{-- ORIGINAL PROFILE AND LOUGOUT BUTTON (When Loggedin) --}}

{{-- <div class="card-footer">
                                    <div class="float-right"> <a class="dropdown-item float-right"
                                            href="/dashboard/{{ Auth::user()->username }}">My
Profile</a>
</div>
<a class="dropdown-item float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div> --}}