<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Store</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-primary">
            <div class="container">
                <div class="col-lg-2">
                    <div class="row">
                        <a class="navbar-brand text-white" href="{{ url('/') }}">
                            Laravel Store
                        </a>
                        
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                <li><a href="" class="text-white nav-link">Add Post</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-4">
                            <form class="form-horizontal" method="POST" action="">
                                <div class="form-group row">
                                    <div class="col-8">
                                        <input type="text" name="searchProduct" class="form-control" placeholder="Search Product">
                                    </div>
                                    <div class="col-4">
                                        <input type="submit" name="" value="Search" class="btn btn-default">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-8">
                           <form class="form-horizontal" method="POST" action="">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <input list="locations" name="location" id="location" class="form-control" placeholder="Select Location">
                                        <datalist id="locations">
                                            <option value="Abaji">
                                            <option value="Apo">
                                            <option value="Area 1"> 
                                            <option value="Garki">   
                                            <option value="Gwagwalada">
                                            <option value="Gwarimpa">
                                            <option value="Maitama">
                                            <option value="Wuse">
                                        </datalist>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                </div>

                

                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
