<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="João Pedro, Renan F.">
    <meta name="description" content="Forca 2.0">
    
    <title>{{ config('app.name'), '2' }}</title>
    
    
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon"> --}}

    <!-- Font awesome -->
    {{-- <script src="https://kit.fontawesome.com/0cd9314373.js"></script> --}}
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">    
    <!-- Date Picker -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.css')}}"> -->
    <!-- Gallery Lightbox -->
    <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet"> 

    <!-- Style -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet"> 
    
    <!-- Theme color -->
    <link id="switcher" href="{{asset('css/cores.css')}}" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
</head>
    <body>

    <!-- NavBar inicio-->
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            {{-- <a class="navbar-brand img-fluid"> <img class="img-fluid" src="{{asset('images/logo2.png')}}" width="200" height="187"> </a> --}}
    
            <a class="navbar-brand" href="javascript:void(0)"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/game">Jogar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/instructions">Instruções</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/scoreboard">Placar</a>
                </li>    
                <li class="nav-item">
                    <a class="nav-link" href="/about">Sobre</a>
                </li>
                
                
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
        </nav>   
        <!--NavBar fim-->

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        
        <div class="container-fluid">
            @yield('content')
        </div>






   
    </body>

  <footer class="page-footer font-medium blue pt-4 ">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="page-footer-area">
                <div class="page-footer-copyright text-center py-3">            
                    <p><small>Desenvolvido por
                    <a href="mailto:renanfrancisco.on@gmail.com">João Pedro</a> e
                    <a href="mailto:renanfrancisco.on@gmail.com">Renan</a>.<br>
                    &copy; Copyright 2019.<a rel="nofollow" href="/politicasprivacidade"> Políticas de Privacidade</a>.<br>
                    </small></p>          
                </div>         
            </div>
      </div>
    </div>
    </div>
</footer>
<!-- Footer -->
</html>