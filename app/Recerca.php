<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recerca extends Model
{
    public $table = 'recerques';

    protected $fillable = [
        'id',
        'es_practica',
        'num_actuacio',
        'estat',
        'data_creacio',
        'data_ultima_modificacio',
        'id_usuari_creacio',
        'id_usuari_ultima_modificacio',
    ];
}
