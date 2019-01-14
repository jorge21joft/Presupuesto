

@extends('layouts.app')

@section('content')
<body>
    



    <div class="container jumbotron">
        <h2>Ingresos</h2>

        <form action="/ingresos/store" method="POST">
          {{csrf_field()}}
       
        <div class=" row">
           
           {{-- <div class="col-xs-2">
            <input id="txtotal" name="totales" type="number" class="form-control input"  placeholder="total "  disabled/>
        </div> --}}

          <div class="col-xs-2">
              <input id="txtCantidad" name="cantidad" type="number" class="form-control input"  placeholder="Cantidad" />
          </div>
          <div class="col-xs-10">
              <div class=" form-group form-inline row">
                  <input id="txtcategoria" type="text" style="width:70%;margin-left:7% " name="categoria" class="form-control" placeholder="Agrege categoria..." disabled />
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-left:3%">
                    Buscar
                  </button>      
                  <button type="button" id="agregarDetalle" class="btn btn-primary glyphicon glyphicon-plus"style="margin-left: 110%;margin-top:-10%">  Agregar</button>       
              </div>
          </div>
      </div>
  
      
      <div class="container">
      
      
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Catalogo de categorias</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
       
              <!-- Modal body -->
              <div class="modal-body">

            
              
                            {{-- foreach donde se desplegaran los tipos de categorias --}}                       
            
                            <table class="table table-hover">
                                  <tr>
                                    <th>tipo de categoria</th>
                                    <th>categorias</th>
                                    <th>subcategorias</th>
                                  </tr>
                                  @foreach ( $data1 as $datos)
                                   @if($datos->tipo_categoria=="ingreso")
                                  <tr>                                
                                 <td>{{ $datos->tipo_categoria}}</td> 
                                 <td>{{ $datos->nombre}}</td> 
                                 <td>{{ $datos->Nombre}}</td>
                               
                                 <td><button  id="AgregarCategoria" onclick="agregarCategoria('{{  $datos->nombre }}', '{{ $datos->tipo_categoria }}' ,'{{  $datos->Nombre }}',{{ $datos->id }} )" 
                                  name="agregar" type="button" class="btn btn-primary"
                                 data-dismiss="modal"> Agregar categoria</button>
                                  </td> 
                                  </tr>
                                  @endif 
                                  @endforeach
                              </table>
              

              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
              </div>
              
            </div>
          </div>
        </div>
        
      </div>
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
                                    <th><h4 id="total">0</h4><input type="hidden" name="total_ingreso" id="total_ingreso"></th>
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


</body>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 

            <script>        

                 var datoscategoria={id:0,cantidad:0,nombre:'',Nombre:'',tipo_categoria:''}

                  var cont=0;
                  var total=0;
                 var subtotal=[];

                   $('#ocultar').hide();
  
                 $(document).ready(function(){
                $("#agregarDetalle").click(function(){
                    agregar();
                  });
                });


                      function agregar(){
                        id= datoscategoria.id;                  
                          categoria = $("#txtcategoria").val();
                          cantidad =parseInt( $("#txtCantidad").val());
                          
                          subcategoria=datoscategoria.Nombre;
                         

                           subtotal.push(cantidad);
                           numArray=subtotal.length;
                           a=numArray-1;
                           total=total+subtotal[a];
                       
                            var fila='<tr class="selected" id="fila'+cont+'">  <td> <input type="number" name="cantidad[]" value="'+cantidad+'">  </td>   <td> <input type="hidden" name="id[]" value="'+id+'"> '+categoria+'  </td>  <td> <input type="text" name="subcategoria[]" value="'+subcategoria+'">  </td> <td> <input type="hidden" name="total" value="'+total+'"> </td>  <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');"> X</button> </td> </tr>';
                            cont++;
                          
                            limpiar();
                            $('#txtotal').val(total);
                            $("#total").html( total);
	            	       		$("#total_ingreso").val(total);
                           evaluar();
                            $('#detalles').append(fila);

                          
                      }

                      //  function enviar(){
                   

                      //         $.ajax({
                      //       method:"post",
                      //           url:'/ingreso',
                      //          data:{
                      //            total : total;
                      //           },
                              
                      //           error: function(){
                      //             alert("error al enviar");
                      //           }
                      //         })

                      //  }


                       function evaluar(){
                         if (total>0){
                             $('#ocultar').show();
                        }
                        else{
                           $('#ocultar').hide();
                         }
                       }

                      function limpiar(){
                        $("#txtCantidad").val("");
                        $("#txtcategoria").val("");
                      }
                      
                      function eliminar(index){
                        total=total-subtotal[index];
                        $("#total").html( total);
                        $('#fila'+index).remove();
                      }

                 function agregarCategoria(nombre,tipo_categoria,Nombre,id){
                  $("#txtcategoria").val(nombre);          
                 datoscategoria.tipo_categoria=tipo_categoria;
                 datoscategoria.Nombre=Nombre;
                 datoscategoria.id=id;
                 
              }



            </script>


