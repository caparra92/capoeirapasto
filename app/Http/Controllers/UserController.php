<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->password = bcrypt($request->password);
        $user->usuario  = $request->usuario;
        $user->email = $request->email;

        $user->save();
        flash('Usuario creado con éxito!!','success')->important();
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('admin.users.profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nombre = $request->get('nombre');
        $user->apellido = $request->get('apellido');
        $user->direccion = $request->get('direccion');
        $user->telefono = $request->get('telefono');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->password = bcrypt($request->get('password'));
        $user->usuario  = $request->get('usuario');
        $user->email = $request->get('email');

        $user->save();
        flash('Usuario editado con éxito!!','warning')->important();
        return redirect('/admin/users/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('Usuario eliminado con éxito!!','danger')->important();
        return redirect('/admin/users/');
    }
}
