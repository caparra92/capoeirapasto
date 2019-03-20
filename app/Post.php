<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'path',
        'user_id',
        'categoria_id'
    ];

    public function user(){

        return $this->belongsTo('App\User');

    }
    
    public function categoria(){

        return $this->belongsTo('App\Categoria');

    }

    public function comentarios(){

        return $this->hasMany('App\Comentario');

    }
}
