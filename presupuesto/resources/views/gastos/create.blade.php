

 @extends('layouts.app')

@section('content')
<div class="container jumbotron">
<form action="/gastos/store" method="POST">
    {{csrf_field()}}

    <h1 align="center">Gastos</h1>


<br>
    <div class="col-xs-2 ">
      Categoria:
       <select name="categoria" id="categoria" class="form-control">
           @foreach($data1 as $datos)
                <option value="{{ $datos->id }}">{{ $datos->nombre }}</option>
           @endforeach
       </select>
    </div>
<br>
    
    <div class="col-xs-2">
      Subcategoria:
        <select class="form-control" name="subcategoria" id="subcategoria">
       <option >seleccione</option>
        </select>
     </div>
<br>
     <div class="col-xs-2">
        Cantidad:
                <input id="txtCantidad" name="cantidad" type="number" class="form-control input"  placeholder="Cantidad" />
            </div>

<br>
     <button type="button" id="agregarDetalle" class="btn btn-primary glyphicon glyphicon-plus"> Agregar</button>       
    

     <br>

       {{-- tabla donde se me mostratran los detalles --}}
       <div >
            <table id="detalles" class="table table-striped table-borderewd table-condesed table-hover">
                 <thead style="background-color:#A9D0F5">
                       <th>
                          cantidad
                       </th>
                                             
                       <th>
                          categorias
                       </th>
                       <th>
                          subcategorias
                        </th>
                        <th>                      
                        </th>
                        <th>
                            opciones
                          </th>
                    
                 </thead>
                 <tfoot>
                  <th>TOTAL</th>                                                              
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><h4 id="total"> 0.00</h4><input type="hidden" name="total_ingreso" id="total_ingreso"></th>
                </tfoot>

                 <tbody>

                 </tbody>
            </table>
         </div><br>


              {{-- boton que me guardara todo --}}
              <div class="col-sm-12" id="ocultar" >
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                      <button type="submit"  class="btn btn-primary">Guardar</button>
                 </div>

    </form>
    <a href="{{ url('/home') }}"  type="button" class="btn btn-primary" style="margin-left: 90%; margin-top:0%">Volver</a>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 

<script>

       var cont=0;
      var total=0;
       var subtotal=[];


           $('#categoria').on('change',function(e){

console.log(e);

  var id_categoria = e.target.value;

  //ajax

     $.get('/subcategoria?id_categoria='+id_categoria,function(data){

   $('#subcategoria').empty();

// $('#subcategoria').append("<option value='' disabled selected style='display:none;'>Seleccione subcategoria</option>");

   $.each(data,function(index,result){


$('#subcategoria').append('<option value="'+result.id+'">'+result.Nombre+'</option>');

});
});
});

      $(document).ready(function(){
     $("#agregarDetalle").click(function(){
     agregar();
     });
   });

  

     function agregar(){
        
      
        id=$('#subcategoria').val();
         categoria = $('#categoria option:selected').text();
         cantidad =parseInt( $("#txtCantidad").val());
         subcategoria = $('#subcategoria option:selected').text();


                        subtotal.push(cantidad);
                           numArray=subtotal.length;
                           a=numArray-1;
                           total=total+subtotal[a];    

  var fila='<tr class="selected" id="fila'+cont+'">  <td> <input type="number" name="cantidad[]" value="'+cantidad+'">  </td>   <td> <input type="hidden" name="id[]" value="'+id+'"> '+categoria+'  </td>  <td> <input type="text" name="subcategoria[]" value="'+subcategoria+'">  </td> <td> <input type="hidden" name="total" value="'+total+'"> </td>   <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');"> X</button> </td> </tr>';
       cont++;
      limpiar();
      $('#txtotal').val(total);
            $("#total").html(" " + total);
	       $("#total_ingreso").val(total);
      $('#detalles').append(fila);
       }

       function limpiar(){
          $("#txtCantidad").val("");
	            	}

                    function eliminar(index){
	            		total=total-subtotal[index];
	            		$("#total").html(" " + total);
	            		$("#total_ingreso").val(total);
	            		$("#fila" + index).remove();
	            		evaluar();
	            	}






</script>

@endsection

