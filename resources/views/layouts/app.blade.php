<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Video Chat Application</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
    <nav class="bg-info navbar-dark fixed-top">
        <div class=" container pt-3">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ url('/video-chat') }}" class="navbar-brand font-weight-bold mb-2 ">Video Chat Application</a>
                </div>
                <div class="col-md-4 ">
                @guest
                           
                                <a class="btn btn-sm btn-secondary mx-2 float-right" href="{{ route('login') }}">{{ __('Login') }}</a>
                           
                            @if (Route::has('register'))
                               
                                    <a class="btn btn-sm btn-secondary  float-right" href="{{ route('register') }}">{{ __('Register') }}</a>
                               
                            @endif 
                        @else
                            
                                <a id="navbarDropdown" class="nav-link text-light mb-0 dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-primary text-dark font-weight-bold" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/video-chat') }}" style="color:white !important;">
                                    Video Chat
                                       
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                 document.getElementById('logout-form').submit();" style="color:white !important;">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </div>
            </div>
        </div>
    </nav>
        

        <main class="py-5" style="margin-top:50px;">
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
