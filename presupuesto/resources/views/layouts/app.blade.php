<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{asset('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>  -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->



<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}"> 
<!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->



@stack('scripts')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->



<script src="{{asset('js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>  -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
            <style>
                    html, body {
                      background-image: url(http://abcpalem.com/wp-content/uploads/2016/09/2.jpg) ;
                                   font-size: 15px
                                }
                    </style>
                                
                    <body>
                        <div id="app">
                      
                    
                           <nav class="navbar navbar-expand-lg navbar-light bg-light" style="color: black">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <a class="navbar-brand" href="{{ url('/') }}"><img style="height: 70px; margin-top: -9%" src="https://fundacionjborja.org/wp-content/uploads/2018/07/JUNTOS1.jpg" alt="" class="navbar-brand" ></a>
                     <!-- Authentication Links -->
                     @guest
                      <div class="collapse navbar-collapse" id="navbarTogglerDemo03" >
                        <ul class="navbar-nav ">
                          <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}" ><span class="glyphicon glyphicon-user"></span>Iniciar Session </a>
                          </li>
                          <li class="nav-item">
                          @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}" ><span class="glyphicon glyphicon-log-in" ></span> Registrarse
                            </a>
                            @endif
                          </li>
                        </ul>
                        @else
                        <ul class="navbar-nav" style="font-size: 16px; ">
                        @if(Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ url('/user') }}" >Administrar Usuarios</a>
                          </li>
                    
                          <li class="nav-item" >
                            <a class="nav-link" href="{{ url('/roles') }}">Administrar Roles</a>
                          </li>
                          @endif
                          </ul>
                          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('/deta')}}"> Usuario:  {{ Auth::user()->name }} </span>
                            </a>
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Session</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                          </li>
                          </ul> 
                        @endguest  
                      </div>
                    </nav>
                            
                    
                         @yield('content')
                    
                        </div>
                     
                    
                       
                    </body>
 <!-- Scripts -->
    <!-- <script src="{{ asset('js/jquery-3.3.1.js') }}" type="text/javascript"></script>-->
    
</html>
