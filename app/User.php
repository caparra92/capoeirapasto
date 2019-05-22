<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'apellido',
        'direccion',
        'telefono',
        'fecha_nacimiento',
        'password',
        'usuario',
        'email',
        'path'
    ];

    public function categorias(){

        return $this->hasMany('App\Categoria');

    }

    public function pagos(){

        return $this->belongsToMany('App\Pago')->withPivot('estado','fecha_asignacion','fecha_pago')->withTimestamps();

    }

    public function comentarios(){

        return $this->hasMany('App\Comentario');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
