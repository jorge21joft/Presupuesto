@extends('layouts.app')

@section('content')
<br>
<div class="container jumbotron">
<table class="table table-hover">
<tr>
    <th>Id</th>
    <th>Fecha</th>
    <th>Descripcion</th>
    <th>opciones</th>
</tr>
  @foreach ( $presupuesto as $presupuesto)
    <tr>
      <td>{{ $presupuesto->id }}</td>
      <td>{{  $presupuesto->fecha }}</td>
      <td>{{  $presupuesto->descripcion }}</td>
      <td>
          <a href="/presupuestos/detalles/{{  $presupuesto->id }}"><button class="btn btn-primary">detalles</button></a>
      </td>
    </tr>
    @endforeach
</table>
</div>
@endsection


