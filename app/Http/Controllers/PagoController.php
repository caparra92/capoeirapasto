<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\Pago;
use App\User;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::all();
        return view('admin.pagos.index')->with('pagos',$pagos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = new Pago;
        $pago->detalle = $request->detalle;
        $pago->descripcion = $request->descripcion;
        $pago->valor = $request->valor;
        
        $pago->save();
        flash('Servicio agregado con éxito!!','success')->important();
        return redirect('/admin/pagos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $pagos = Pago::all();
        $user = User::find($id);
        return view('admin.pagos.profile')->with('user',$user)->with('pagos',$pagos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::find($id);
        return view('admin.pagos.edit')->with('pago',$pago);
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
        //dd($request);
        $pago = Pago::find($id);
        $pago->nombre = $request->get('detalle');
        $pago->descripcion = $request->get('descripcion');
        $pago->valor = $request->get('valor');

        $pago->save();
        flash('Servicio editado con éxito!!','warning')->important();
        return redirect('/admin/pagos/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pago = Pago::find($id);
        $pago->delete();
        flash('Servicio eliminado con éxito!!','danger')->important();
        return redirect('/admin/pagos/');
    }

    public function user($id)
    {
        $pago = Pago::find($id);
        $users = User::all();
        return view('admin.pagos.addUser')->with('users', $users)->with('pago',$pago);
    }

    public function addUser(Request $request,$id)
    {
        $pago = Pago::find($id);
        $pago->users()->attach($request->user_id,['estado'=>$request->estado,
                                'fecha'=>$request->fecha         
                                ]);
        flash('Usuario agregado con éxito!!','success')->important();
        return redirect('/admin/pagos/user');
    }

    public function pagosIndex()
    {
        $meses = DB::select('select distinct MONTHNAME(pago_user.fecha) as mes,MONTH(fecha) as mesNum from pago_user');
        $anos = DB::select('select distinct YEAR(pago_user.fecha) as ano from pago_user');
        $pagos = DB::table('pago_user')
                        ->join('pagos','pagos.id','=','pago_user.pago_id')    
                        ->join('users','users.id','=','pago_user.user_id')
                        ->select('pago_user.*','users.id as user_id','users.nombre','pagos.id as pago_id','pagos.detalle','pagos.valor')
                        ->get();
        $total_pag = DB::select('select sum(valor) as total_pagados from pagos inner join pago_user where pago_user.estado="pagado" and pago_user.pago_id = pagos.id');
        $total_pend = DB::select('select sum(valor) as total_pagados from pagos inner join pago_user where pago_user.estado="pendiente" and pago_user.pago_id = pagos.id');
        //dd($total_pend);
        return view('admin.pagos.pagosUser',['pagos'=>$pagos,'meses'=>$meses,'anos'=>$anos,'total_pag'=>$total_pag,'total_pend'=>$total_pend]);
    }

    public function editUser($id){
        
        $users = User::all();
        $pago = DB::table('pago_user')
                        ->where('pago_user.id',$id)
                        ->join('pagos','pagos.id','=','pago_user.pago_id')
                        ->join('users','users.id','=','pago_user.user_id')
                        ->select('pago_user.*','pagos.detalle')
                        ->get();
        //dd($pago);
        return view('admin.pagos.editUser')->with('pago',$pago)->with('users',$users);
    }

    public function updateUser(Request $request,$id){
      
        $pago = DB::table('pago_user')
                        ->where('pago_user.id',$id)
                        ->update(['estado'=>$request->estado,
                                'fecha'=>$request->fecha,
                                'user_id'=>$request->user_id
                                ]);
        flash('Pago editado con éxito!!','warning')->important();
        return redirect('/admin/pagos/user/');
    }

    public function deleteUser($id){
        
        //dd($id);
        $pago = DB::table('pago_user')
                        ->where('pago_user.id',$id)
                        ->delete();
        flash('Pago eliminado con éxito!!','danger')->important();
        return redirect('/admin/pagos/user/');
    }

    public function updateEstado($id){
        $estado = DB::table('pago_user')
                        ->where('pago_user.id',$id)
                        ->update(['estado'=>'pagado']);
        flash('Pago realizado con éxito!!','success')->important();
        return redirect('/admin/pagos/user/');
    }

    public function filter(Request $request){
        
        $pagos = DB::select('select pago_user.id,estado,fecha,users.nombre,pagos.detalle,pagos.valor from pago_user inner join users on users.id = pago_user.user_id inner join pagos on pagos.id = pago_user.pago_id where pago_user.estado = '."'".$request->estado."'".' and MONTH(fecha) = '.$request->mes.' and YEAR(fecha) = '.$request->ano);
                    
        return response()->json($pagos);
    }
}
