<?php

namespace App\Http\Controllers;


use App\Tipo_categoria;
use App\Detalle_gasto;
use App\Presupuesto;
use App\Categoria;
use App\Subcategoria;
use DB;
use App\Gasto;
use Illuminate\ Support \ Facades \ Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    $data1= DB::table('tipo_categorias')->join('categorias',function($join){
    //        $join->on('tipo_categorias.categoria_id','=','categorias.id');
    //    })->join('subcategorias', function($join){
    //       $join->on('tipo_categorias.subcategoria_id','=','subcategorias.id');
    //    })->select('tipo_categorias.id','categorias.nombre','subcategorias.Nombre','categorias.id')->get();
  
    // $data1= DB::table('categorias')->join('subcategorias',function($join){
    //     $join->on('categorias.id','=','subcategorias.categoria_id');
    // })->select('categorias.id','subcategorias.Nombre','categorias.nombre')->get();

    // $data1 = DB::table('categorias')
    // ->join('subcategorias', 'categorias.id','=','subcategorias.categoria_id')
    // ->select('categorias.id','categorias.nombre')->get();
  
    // $data1 = DB::table("tipo_categorias")->join('categorias',function($join){
    //     $join->on('tipo_categorias.categoria_id','=','categorias.id');
    // })->select('categorias.id','tipo_categorias.tipo_categoria','categorias.nombre')->get();

    $data1 = Categoria::all();

    // $data2 = DB::table();

       return view('gastos.create', ['data1'=>$data1]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{


            $presupuesto = Presupuesto::where('user_id',Auth::user()->id)->orderBy('id','desc')->first();

            DB::beginTransaction();


          
              $total=$request->get('total');  

            //   consulta a gastos
              $gastos= new Gasto;   
        
             $gastos->presupuesto_id = $presupuesto->id;               
             $gastos->total= $total;
              $gastos->save();


              $id = $request->get('id');
              $cantidad = $request->get('cantidad');        
              $nombre = $request->get('nombre');
              $tipo_categoria = $request->get('categoria');
              $Nombre = $request->get('Nombre');

              
              $cont = 0;



              while($cont < count($id)){              
                  $detalle = new Detalle_gasto();
                         
                  $detalle->gasto_id = $gastos->id;      
                  $detalle->subcategoria_id = $id[$cont];       
                  $detalle->cantidad = $cantidad[$cont] ;                                   
                 

                  $detalle->save();
                  $cont=$cont+1;
              }



            DB::commit();
            
     }
     catch(exception $e)
     {
            DB::rollback();
     }

     return redirect('presupuestos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        //
    }


    // public function subcat(Resquest $request, $id){

    //   $id_categoria = input::get('id_categoria');
    // $subcategoria = Subcategoria::where('categoria_id','=',$id_categoria)->get();

    // return response()->json($subcategoria);
    // }

}
