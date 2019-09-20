<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Clark Job Portal</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .btn-cdc {
           background-color: #104dac; 
           color: white;
        }
        .btn-cdc:hover {
             background-color:white; 
           color: #104dac; 
           border: 1px solid #FD8971; ;
        }
    </style>
</head>
<body style="background-color: #f6f2f2;">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid"  style="margin-left: 30px; margin-right: 30px;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/cdclogo.png')}}" alt="clarklogo" width="70" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link" href="{{ route('home') }}" >{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item button-nav1">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item button-nav1">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:black;">


                                    @if (Auth::check() && Auth::user() -> user_type =='company')
                                        @if(!empty(Auth::user()-> company-> logo))
                                            <img src="{{asset('uploads/logo/')}}/{{Auth::user() -> company-> logo}}" width="30"  height ="30" class="rounded-circle">
                                        @else
                                            <img src="{{asset('avatar/company.png')}}" width="50" class="rounded-circle">
                                        @endif
                                        {{ Auth::user() -> company -> company_name}}
                                        <span class="caret"></span>
                                    @elseif(Auth::check() && Auth::user() -> user_type =='seeker')
                                        @if(!empty(Auth::user()-> profile -> avatar ))
                                            <img src="{{asset('uploads/avatar/')}}/{{Auth::user() -> profile-> avatar}}" class="rounded-circle" width="30">
                                        @else
                                            <img src="../../avatar/man.png" width="30" height="30" class="rounded-circle">
                                        @endif
                                            {{ Auth::user()->f_name}}
                                            <span class="caret"></span>
                                    @else
                                        <img src="../../avatar/admin.png" width="30" height="30" class="rounded-circle">
                                        Admin
                                        <span class="caret"></span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('My Account') }}
                                    </a>
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

        <main class="py-4" >
            @yield('content')
        </main>
    </div>
</body>
</html>