<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovCaja extends Model
{
    protected $fillable = [
        'base',
        'fecha_apertura',
        'fecha_cierre',
        'diferencia',
        'observaciones'
    ];

    public function cajas(){
        return $this->belongsTo('App\Caja');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function egresosUser(){
        return $this->belongsToMany('App\User')->withPivot('concepto','valor','valor_total');
    }

    public function egresosCaja(){
        return $this->belongsToMany('App\Caja')->withPivot('concepto','valor','valor_total');
    }

    public function ingresosCaja(){
        return $this->belongsToMany('App\Caja','ingresos_caja')->withPivot('concepto');
    }

    public function ingresosPagos(){
        return $this->belongsToMany('App\Pago','ingresos_caja')->withPivot('concepto');
    }
}
