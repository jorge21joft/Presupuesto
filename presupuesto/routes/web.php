<?php
 use Illuminate\Support\Facades\Input; 
 use App\Subcategoria;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('roles', 'RolController');

Route::resource('user', 'UserController');

Route::resource('ingresos','IngresoController');

Route::resource('gastos','GastoController');

Route::resource('presupuestos','PresupuestoController');


// ruta para el create de presupuesto
Route::get('/home/presupuesto/create','PresupuestoController@create' )->name("presupuesto.create");

// ruta para guardar presupuesto
Route::post('/presupuesto','PresupuestoController@store')->name("presupuesto");

//ruta para mostrar los presupuestos
Route::resource('/presupuestos/detalles','PresupuestoController');

// ruta para guardar los detalles de ingreso
Route::post('/presupuesto/ingreso','DetalleIngresoController@store')->name("ingreso.store");

// ruta para guardar el ingreso
Route::post('/ingresos/store','IngresoController@store')->name('ingreso.create');

// ruta para guardar el gasto
Route::post('/gastos/store','GastoController@store')->name('gastos.create');




Route::get('/presupuesto',['as'=>'/presupuesto',  function ()
{
    return view('presupuesto.create');
}]);
Route::get('/Informacion',['as'=>'/info',  function ()
{
    return view('info.infor');
}]);
Route::get('/contac',['as'=>'/mas',  function ()
{
    return view('info.contac');
}]);
Route::get('/detalle',['as'=>'/deta',  function ()
{
    return view('deta.index');
}]);

// ruta para mostrar las subcategorias
Route::get('/subcategoria',function(){
    $id_categoria = Input::get('id_categoria');
    $subcategoria = Subcategoria::where('categoria_id','=',$id_categoria)->get();
    return response()->json($subcategoria);
});