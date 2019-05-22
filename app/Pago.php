<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'detalle'
    ];

    public function users(){

        return $this->belongsToMany('App\User')->withPivot('estado','fecha_asignacion','fecha_pago')->withTimestamps();

    }
}
