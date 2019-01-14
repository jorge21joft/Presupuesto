@extends('layouts.app')

@section('content')

<body>
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet"> 
<div class="container" style="margin-top:9%">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron" style="border: 1px solid">
            <h1 style="margin-left: 20%; font-family: 'Pacifico', cursive;">Detalles del usuario</h1>
            <br>
            <ul style="font-size: 25px;margin-left: 10%">
            <li><b> USUARIO: </b> {{ Auth::user()->name }}</li>
            <br>
               <li> <b> EMAIL: </b> {{ Auth::user()->email }}</li>
               <br>
               <li>
               <b>Rol: </b>
               @if(Auth::user()->hasRole('admin'))
                    administrador
                @endif
                @if(Auth::user()->hasRole('user'))
                     Usuario
                @endif
                @if(Auth::user()->hasRole('invitado'))
                 Invitado
                @endif
               </li>
               <br>
               <div >
               @if(Auth::user()->hasRole('admin'))
               <div class="alert alert-success col-md-4" style="margin-left: 63%; margin-top: -28%;border " role="alert">
                <h4 class="alert-heading">¡Tus beneficios de admin!</h4>
                <p>-tener control de la pagina en general. </p> <p>-administrar roles y usuarios. </p>
                </div>
                @endif
                @if(Auth::user()->hasRole('user'))
                <div class="alert alert-success col-md-4" style="margin-left: 63%; margin-top: -28% " role="alert">
                <h4 class="alert-heading">¡Tus beneficios de usuario!</h4>
                <p>-hacer presupuestos. </p> <p>-administrar tu usuario. </p>
               
                </div>
                @endif
                @if(Auth::user()->hasRole('invitado'))
                <div class="alert alert-success col-md-4" style="margin-left: 63%; margin-top: -28% " role="alert">
                <h4 class="alert-heading">¡Tus beneficios de invitado!</h4>
                <p>-lo unico que puedes hacer es ver no tocar  </p>
                
                </div>
                @endif</div>
                </ul>
               <a href="{{ url('/home') }}" type="button" class="btn btn-primary" style="margin-left: 80%">Volver</a>
               <!--@if(Auth::user()->hasRole('user'))
                <a href="" class="btn  btn-warning">Modificar</a>
                </div>
                @endif
                @if(Auth::user()->hasRole('invitado'))
                <a href="" class="btn  btn-warning">Modificar</a>
                </div>
                @endif-->
            </div>
        </div>
    </div>
</div>
</body>
@endsection
