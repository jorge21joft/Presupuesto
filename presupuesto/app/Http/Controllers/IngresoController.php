<?php

namespace App\Http\Controllers;

use App\Ingreso;
use App\Tipo_categoria;
use App\Detalle_ingreso;
use App\Presupuesto;
use App\Categoria;
use DB;
use Illuminate\ Support \ Facades \ Auth;
use SisBodega\Http\Requests\IngresoFormRequest;
use Illuminate\Http\Request;

class IngresoController extends Controller
{

   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
               if($request){
                   $query=trim($request->get('searchText'));
                   $ingresos=DB::table('ingresos as in')
                   ->join('presupuestos as pre', 'pre.id','=','in.presupuesto_id')
                   ->join('detalle_ingresos as det','det.ingreso_id','=','in.id')
                   ->select('in.id','det.id','det.cantidad','pre.id','pre.fecha','pre.descripcion',DB::raw('sum(det.cantidad + cantidad)as total'))
                   ->orderBy('in.id','desc')
                   ->groupBy('in.id','det.id','det.cantidad')
                   ->paginate(7);
                   return view('ingresos.opciones',['ingresos'=>$ingresos]);
               }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     

      $data1= DB::table('tipo_categorias')->join('categorias',function($join){
          $join->on('tipo_categorias.categoria_id','=','categorias.id');
      })->join('subcategorias', function($join){
        $join->on('tipo_categorias.subcategoria_id','=','subcategorias.id');
     })->select('tipo_categorias.id','tipo_categorias.tipo_categoria','categorias.nombre','subcategorias.Nombre')->get();


//  $data1= DB::table('tipo_categorias as t')
//  ->join('categorias as c','t.categoria_id','=','c.id')
//  ->join('subcategorias as s','t.subcategoria_id','=','s.id')
//  ->select('t.id','t.tipo_categoria','c.nombre','c.id','s.Nombre','s.id');
       
     return view('ingresos.opciones', ['data1'=>$data1]);
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

              $ingresos= new Ingreso;   
        //    $ingresos->total = $request->input('total');
             $ingresos->presupuesto_id = $presupuesto->id;  
                
             $ingresos->total= $total;
              $ingresos->save();


              $id = $request->get('id');
              $cantidad = $request->get('cantidad');        
              $nombre = $request->get('nombre');
              $tipo_categoria = $request->get('categoria');
              $Nombre = $request->get('Nombre');

              
              $cont = 0;



              while($cont < count($id)){
                  $detalle = new Detalle_ingreso();
                  $detalle->ingreso_id = $ingresos->id;             
                  $detalle->cantidad = $cantidad[$cont] ;                                   
                 $detalle->tipo_categoria_id= $id[$cont];

                  $detalle->save();
                  $cont=$cont+1;
              }

            DB::commit();
            
     }
     catch(exception $e)
     {
            DB::rollback();
     }


        //     $ingreso = DB::table('Presupuestos')->join('ingresos',function($join){
        //     $join->on('ingresos.presupuesto_id','=','presupuestos.id');
        //  })->select('Presupuestos.fecha','Presupuestos.descripcion','ingresos.total')->get();

        //  return view('ingresos.show',['ingreso'=>$ingreso]);

         return redirect('gastos/create');


       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 


         $ingreso = DB::table('ingresos')
         ->join('presupuestos', 'presupuestos.id','=','ingresos.presupuesto_id')
         ->join('detalle_ingresos','detalle_ingresos.ingreso_id','=','ingresos.id')
         ->select('ingresos.id','ingresos.total','detalle_ingresos.cantidad','presupuestos.fecha','presupuestos.descripcion')
         ->where('ingresos.id','=',$id)
         ->first();

        // $detalles = DB::table('detalle_ingresos as d')
        // ->join('tipo_categorias as t','d.tipo_categoria_id','=','t.id')
        // ->select('t.tipo_categoria','d.cantidad','d.id')
        // ->where('d.ingreso_id','=',$id)->get();

        return view('ingresos.show',["ingreso"=>$ingreso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso, $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->update();
        
    }
}
