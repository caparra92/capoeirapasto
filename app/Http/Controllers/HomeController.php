<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Nmymensu= DB::table('pago_user')
                        ->where('user_id','=',Auth::user()->id)
                        ->where('estado','=','pendiente')->count();
        return view('admin.dashboard')->with('Nmymensu',$Nmymensu);
    }
}
