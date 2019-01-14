<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use App\Tipo_categoria;
use App\Subcategoria;
use App\Categoria;
use App\Ingreso;
use App\Gasto;
use DB;
use Illuminate\Http\Request;
use Illuminate\ Support \ Facades \ Auth;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    obteninedo todos los datos del presupuesto
        $presupuesto = Presupuesto::all();

        // retornando todos los datos del presupuesto a la vista de index
    return view('presupuesto.index',compact('presupuesto'));
    }

 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // retornando vista
        return view('presupuesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        // almacenando los datos del presupuesto
       $datos = new Presupuesto;
       $datos->fecha = $request->input('fecha');
       $datos->descripcion = $request->input('descripcion');
       $datos->asesoria = $request->input('asesoria');
        // obteniendo el id del usuario que esta logueado   
      $datos->user_id= Auth::user()->id;

       $datos->save();
 
      // redireccionando a la ruta create de ingresos
      return redirect('ingresos/create');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
      // la consulta para mostrar los datos de los ingresos en una tabla
    $ingreso = DB::table('ingresos')->join('detalle_ingresos',function($join){
        $join->on('detalle_ingresos.ingreso_id','=','ingresos.id');
    })->join('tipo_categorias',function($join){
        $join->on('tipo_categorias.id','=','detalle_ingresos.tipo_categoria_id');
    })->join('categorias',function($join){
        $join->on('categorias.id','=','tipo_categorias.categoria_id');
    })->join('subcategorias',function($join){
        $join->on('subcategorias.id','=','tipo_categorias.subcategoria_id');
    })->select('detalle_ingresos.cantidad','ingresos.presupuesto_id','ingresos.total','categorias.nombre','subcategorias.Nombre')->where('ingresos.presupuesto_id','=',$id)->get();
    

    //    consulta para mostrar los los datos de los gastos en una tabla
    $gasto = DB::table('gastos')->join('detalle_gastos',function($join){
        $join->on('detalle_gastos.gasto_id','=','gastos.id');
        })->join('subcategorias',function($join){
            $join->on('detalle_gastos.subcategoria_id','=','subcategorias.id');
        })->join('categorias',function($join){
            $join->on('subcategorias.categoria_id','=','categorias.id');
        })->select('categorias.nombre','subcategorias.Nombre','detalle_gastos.cantidad','gastos.presupuesto_id','gastos.total')->where('gastos.presupuesto_id','=',$id)->get();
 
        // consulta para mostrar el total de los ingresos en la tabla
        $total = DB::table('ingresos')->select('ingresos.total')->where('ingresos.presupuesto_id','=',$id)->first();
        // consulta para mostrar el total de gastos en una tabla
       $total_gasto = DB::table('gastos')->select('gastos.total')->where('gastos.presupuesto_id','=',$id)->first();

       //,DB::raw('sum(ingresos.total-gastos.total) as Total')

         //consulta para obtener el total de ingresos y el total de gastos para restarlos y mostrarlos en una tabla
       $total_todo = DB::table('ingresos')->join('presupuestos',function($join){
           $join->on('ingresos.presupuesto_id','=','presupuestos.id');
       })->join('gastos',function($join){
           $join->on('presupuestos.id','=','gastos.presupuesto_id');
       })->select('ingresos.total','presupuestos.fecha','gastos.total')
        ->where('ingresos.presupuesto_id','=',$id  )->get();
      
        return view('presupuesto.show', ['ingreso'=>$ingreso,'total'=>$total,'gasto'=>$gasto,'total_gasto'=>$total_gasto ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $presupuesto)
    {
        //
    }
}
