<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\Pago;
use App\User;
use App\Caja;
use App\MovCaja;
use View;
use Carbon\Carbon;

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
        //vista mis pagos
        $pagos = Pago::all();
        $user = User::find($id);
        foreach($user->pagos as $key=>$pago){
            Carbon::setLocale('es');
            $obj = new Carbon($pago->pivot->fecha_asignacion);
            $fecha = $obj->format('F');
            $mes = $obj->formatLocalized('%B');
            //dd($mes);
            $pago->mes = $fecha;
            //dd($pago->mes);
        } 
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
        $pago->detalle = $request->get('detalle');
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
                                'fecha_asignacion'=>$request->fecha_asignacion,
                                'fecha_pago'=>$request->fecha_pago
                                ]);
        flash('Usuario asignado con éxito!!','success')->important();
        return redirect('/admin/pagos/user');
    }

    public function pagosIndex()
    {
        $obj = new Carbon;
        $hoy = $obj->now();
        $pagos_users = DB::table('pago_user')
                    ->select('pago_user.*')
                    ->get();
        foreach($pagos_users as $key=>$pagouser){
            $ob = new Carbon($pagouser->fecha_pago);
            $pagouser->fecha_pago = $ob;
            if($hoy>$pagouser->fecha_pago){
                DB::table('pago_user')
                        ->where('fecha_pago','<',$hoy)
                        ->where('estado','<>','pagado')
                        ->update(['estado'=>'vencido']);
            }
        }

        $meses = DB::select('select distinct MONTHNAME(pago_user.fecha_asignacion) as mes,MONTH(fecha_asignacion) as mesNum from pago_user');
        $anos = DB::select('select distinct YEAR(pago_user.fecha_asignacion) as ano from pago_user');
        $pagos = DB::table('pago_user')
                        ->join('pagos','pagos.id','=','pago_user.pago_id')    
                        ->join('users','users.id','=','pago_user.user_id')
                        ->select('pago_user.*','users.id as user_id','users.nombre','pagos.id as pago_id','pagos.detalle','pagos.valor as valor')
                        ->get();
        $total_pag = DB::select('select sum(valor) as total_pagados from pagos inner join pago_user where pago_user.estado="pagado" and pago_user.pago_id = pagos.id');
        $total_pend = DB::select('select sum(valor) as total_pagados from pagos inner join pago_user where pago_user.estado="pendiente" and pago_user.pago_id = pagos.id');
        $total_venc = DB::select('select sum(valor) as total_pagados from pagos inner join pago_user where pago_user.estado="vencido" and pago_user.pago_id = pagos.id');
        //dd($cajas);
        return view('admin.pagos.pagosUser',['pagos'=>$pagos,'meses'=>$meses,'anos'=>$anos,'total_pag'=>$total_pag,'total_pend'=>$total_pend, 'total_venc'=>$total_venc]);
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
                                'fecha_pago'=>$request->fecha_pago,
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

    public function selectCaja($id){
        $pago = DB::table('pago_user')
                        ->where('pago_user.id',$id)
                        ->join('pagos','pagos.id','=','pago_user.pago_id')
                        ->select('pago_user.*','pagos.*')
                        ->get();
        
        $cajas = Caja::all();
        return view('admin.pagos.caja')->with('cajas',$cajas)->with('pago',$pago)->with('pago_user_id',$id);
    }

    public function updateEstado(Request $request,$id){
        //dd($request->all());
        $obj = new Carbon;
        $hoy = $obj->now();
        
        $caja = Caja::find($request->caja);
        if($caja->estado =="abierta"){
            $estado = DB::table('pago_user')
                        ->where('pago_user.id',$id)
                        ->update(['estado'=>'pagado','fecha_pago'=>$hoy]);
            $caja->saldo_anterior = $caja->saldo_actual;
            $caja->saldo_actual = $caja->saldo_actual + $request->valor;
            $movcaja = MovCaja::where('caja_id','=',$request->caja)->get();
            $movcaja = $movcaja->last();
            /* $movcaja->ingresosPagos()->attach($request->pago_id,['concepto'=>$request->detalle,
                                                            'pago_id'=>$request->pago_id,
                                                            'user_id'=>1,
                                                            'mov_caja_id'=>$movcaja->id]); */
            $ingresos_caja = DB::table('ingresos_caja')
                                ->insert(['concepto'=>$request->detalle,
                                        'pago_id'=>$request->pago_id,
                                        'user_id'=>$request->user_id,
                                        'mov_caja_id'=>$movcaja->id
                                        ]);
            $caja->save();
            flash('Pago realizado con éxito!!','success')->important();
            return redirect('/admin/pagos/user/');
        }
        else{
            flash('La caja seleccionada se encuentra cerrada!!','danger')->important();
            return back();
        } 
    }

    public function filter(Request $request){
        
        $pagos = DB::select('select pago_user.id,estado,fecha_asignacion,fecha_pago,users.nombre,pagos.detalle,pagos.valor from pago_user inner join users on users.id = pago_user.user_id inner join pagos on pagos.id = pago_user.pago_id where pago_user.estado = '."'".$request->estado."'".' and MONTH(fecha_asignacion) = '.$request->mes.' and YEAR(fecha_asignacion) = '.$request->ano);
                    
        return response()->json($pagos);
    }
}
