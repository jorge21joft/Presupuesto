@extends('layouts.app')


@section('content')
<br>
<div class="container jumbotron">
             <h1 class="text-center">Administracion de Usuarios</h1>

              <a href="{{ route('user.create') }}" class="btn btn-primary">Nuevo</a>  

            <hr>
            
           <script>
               //APLIACINDO PLUGIN A TABLA
               $(document).ready(function() {
                    $('#tregistros').DataTable();
                } );
           </script>
       
               <table id="tregistros" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->id}}</td>
                                <td>{{$dato->name}}</td>
                                <td>{{$dato->email}}</td>
                                <td>
                                   
                                    <form action="{{Route('user.destroy',array($dato->id))}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="{{Route('user.edit',array($dato->id))}}" class="btn  btn-warning">Modificar</a>
                                        <button class="btn btn-danger" type="Submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                   
                   
              </table>   

              <a href="{{ url('/home') }}"  type="button" class="btn btn-primary" style="margin-left: 90%; margin-top:0%">Volver</a>
 </div>


@endsection