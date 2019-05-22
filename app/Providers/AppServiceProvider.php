<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use View;
use App\Pago;
use App\Post;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::statement("SET lc_time_names = 'es_ES'");
        $Nposts = Post::all()->groupby('titulo')->count();
        
        $Npendientes = DB::table('pago_user')
                        ->where('estado','=','pendiente')->count();
        $Nmensu_pend= DB::table('pago_user')
                        ->where('pago_id','=','5')
                        ->where('estado','=','pendiente')->count();
        
        $Nusers = User::all()->groupby('id')->count();
        
        View::share(['Nposts'=>$Nposts,'Npendientes'=>$Npendientes,'Nusers'=>$Nusers,'Nmensu_pend'=>$Nmensu_pend]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
