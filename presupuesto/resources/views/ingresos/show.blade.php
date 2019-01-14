@extends('layouts.app')

@section('content')
<div class="container jumbotron">
<h1>listado de ingresos</h1>

{{-- @foreach($ingreso as $ing)

<h4>{{ $ing }}</h4>

@endforeach --}}
{{-- {{ $ingreso }} --}}

<table id="tregistros" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            
            <th scope="col">fecha presupuesto</th>
            <th scope="col">descripcion</th>
            <th scope="col">total</th>
            
        </tr>
    </thead>

    <tbody>
         @foreach($ingreso as $ing) 
            <tr>
                <td>{{ $ing->cantidad }}</td> 
                <td></td>
                <td></td>
         
            </tr>
      @endforeach 
    </tbody>
   
   
</table>   
</div>

@endsection