<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $fillable = [
        'nombre',
        'saldo_actual',
        'saldo_anterior',
        'estado'
    ];

    public function mov_cajas(){
        return $this->hasMany('App\MovCaja');
    }
}
