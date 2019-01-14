<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use App\RoleUser;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(array('auth','permisoRol:admin'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      


       $datos=User::all();
        return View('user.index',['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View('user.agregar',['roles'=>Role::all()]);
    }

   /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $registro = new User();
        // $registro->name = $request->input('name');
        // $registro->email = $request->input('email');
        // $registro->password =bcrypt($request->input('password'));
        // $registro->save();
        // return redirect('user');

        $this->validate($request,[ 'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        'password' => ['required', 'string', 'confirmed']]);

        $user=User::create($request->all());

        $user->roles()->attach(Role::where('name',  $request->input('rol'))->first());

        return redirect()->route('user.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $dato=User::find($id);
        $user_rol=RoleUser::where('user_id',$id)->first();
        $rol=Role::find($user_rol->role_id);

        $roles=Role::all();

        return view('user.editar',compact('dato','rol','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $this->validate($request,[ 'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        'password' => ['required', 'string', 'confirmed']]);

        User::find($id)->update($request->all());
        return redirect()->route('user.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
