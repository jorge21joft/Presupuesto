
@extends('layouts.app')

@section('content')
<br>
<div class="container jumbotron">
<h1 align="center">Tabla de ingresos</h1>

<table class="table table-hover">
<tr>
   
   
    <th>categoria</th>
    <th>subcategoria</th>
    <th>Cantidad</th>
   
</tr>
  @foreach (  $ingreso as $ing)
    <tr>
 
     
      <td>{{ $ing->nombre }}</td>
      <td>{{ $ing->Nombre }}</td>
      <td><b>{{ $ing->cantidad }}</b></td>
     
    </tr>
    @endforeach
<tr>
<th colspan="2">total de ingresos</th>
<th>$ {{  number_format( $total->total,2) }}</th>
</tr>



</table>

<br><br>

<h1 align="center">Tabla de gastos</h1>

<table class="table table-hover">
  <tr>
     
     
      <th>categoria</th>
      <th>subcategoria</th>
      <th>Cantidad</th>
     
  </tr>
    @foreach ($gasto as $gastos)
      <tr>  
        <td>{{ $gastos->nombre }}</td>
        <td>{{ $gastos->Nombre }}</td>
        <td><b>{{ $gastos->cantidad }}</b></td>
       
      </tr>
      @endforeach 
   <tr>
  <th colspan="2">total de gastos</th>
   <th>$ {{  number_format( $total_gasto->total,2) }}</th> 
  </tr>
  
  </table>

  

   {{ (number_format( $total->total,4)-number_format( $total_gasto->total,4)) }} 

</div>
@endsection