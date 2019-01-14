@extends('layouts.app')

@section('content')

<div class="container jumbotron" style="margin-top:7%">
        <div class="row justify-content-center">
            <div class="col-md-8">
       
              <h1>crear presupuesto</h1>
    <br>
             <form action="/presupuesto" method="POST">
                 {{csrf_field()}}
    
                  <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">fecha</label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" name="fecha" placeholder="digite la fecha">
                    </div>
                  </div>
    
                   <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">descripcion</label>
                    <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" placeholder="digite una descripcion">
                    </div>
                   </div>
    
                    <div class="form-group row">
                    <label  class="col-sm-3 col-form-label">asesoria</label>
                    <div class="col-sm-6">
                   
                    <input type="tex" class="form-control" name="asesoria" placeholder="campo de asesoria"> 
                         
                    </div>
                   </div>
    
    
    
                    <div class="col-sm-12">
                        <button type="submit"  class="btn btn-primary">Guardar</button>
                    </div>
                    <a href="{{ url('/home') }}"  type="button" class="btn btn-primary" style="margin-left: 90%; margin-top:-8%">Volver</a>
              </form>
    
            </div>
       </div>
    </div>
    


@endsection