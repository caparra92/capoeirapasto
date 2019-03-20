<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post(){

        return $this->hasMany('App\Post');

    }
}
