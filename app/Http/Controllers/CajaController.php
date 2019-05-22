<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Caja;
use App\MovCaja;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajas = Caja::all();
        return view('admin.cajas.index')->with('cajas',$cajas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cajas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caja = new Caja;
        $caja->nombre = $request->nombre;
        $caja->saldo_actual = $request->saldo_actual;
        $caja->saldo_anterior = 0;
        $caja->estado = "cerrada";
        
        $caja->save();
        flash('Caja creada con éxito!!','success')->important();
        return redirect('/admin/cajas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caja = Caja::find($id);
        return view('admin.cajas.edit')->with('caja',$caja);
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
        $caja = Caja::find($id);
        $caja->nombre = $request->nombre;
        $caja->saldo_actual = $request->saldo_actual;
        $caja->estado = $request->estado;
        $caja->save();
        flash('Caja actualizada con éxito!!','warning')->important();
        return redirect('/admin/cajas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caja = Caja::find($id);
        $caja->delete();
        flash('Caja eliminada con éxito!!', 'danger')->important();
        return redirect('/admin/cajas');
    }

    public function apertura($id){
        $caja = Caja::find($id);
        $users = User::all();
        return view('admin.cajas.apertura')->with('caja',$caja)->with('users',$users);
    }

    public function updateEstado(Request $request,$id){
        $caja = Caja::find($id);
            $caja->estado = "abierta";
            $caja->saldo_actual = $request->base;
            $caja->save();
            $movcaja = new MovCaja;
            $movcaja->base = $request->base;
            $movcaja->fecha_apertura = $request->fecha;
            $movcaja->fecha_cierre = "abierta";
            $movcaja->diferencia = 0;
            $movcaja->observaciones = $request->observaciones;
            $movcaja->caja_id = $id;
            $movcaja->user_id = $request->user_id;
            $movcaja->save();  
        flash('Caja '.$caja->estado.' con éxito!!','success')->important();
        return redirect('/admin/cajas');
    }

    public function cierre($id){
        $caja = Caja::find($id);
        $caja->estado = "cerrada";
        $ultimosaldocaja = $caja->saldo_actual;
        $caja->saldo_anterior = $caja->saldo_actual;
        $caja->saldo_actual = 0;
        foreach($caja->mov_cajas as $key=>$movcaja){
            $obj = new Carbon;
            $date = $obj->now();
            $date = $date->toFormattedDateString();
            $movcaja->fecha_cierre = $date;
            $movcaja->diferencia = $movcaja->base - $ultimosaldocaja;
            $movcaja->save();
        }
        $caja->save();
        flash('Caja '.$caja->estado.' con éxito!!','success')->important();
        return redirect('/admin/cajas');  
    }

    public function movindex($id){
        $caja = Caja::find($id);

        $movcajas = DB::table('mov_cajas')
                ->where('caja_id','=',$id)
                ->join('users','users.id','=','mov_cajas.user_id')
                ->select('users.nombre','mov_cajas.*')
                ->get();
        //dd($movcajas);
        foreach($movcajas as $key=>$movcaja){
            $fecha_apertura = new Carbon($movcaja->fecha_apertura);
            $fecha_apertura = $fecha_apertura->toFormattedDateString();
        }
        //dd($fecha_apertura);
        //$movcajas = MovCaja::all();
        return view('admin.cajas.movindex')->with('caja',$caja)->with('fecha_apertura',$fecha_apertura)->with('movcajas',$movcajas);
    }
}
