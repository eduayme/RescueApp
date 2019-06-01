<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desaparegut extends Model
{
    public $table = 'desapareguts';

    protected $fillable = [
        'id',
        'id_recerca',
        'nom',
        'nom_respon',
        'edat',
        'telefon',
        'whatsapp_o_gps',
        'perfil',
        'descripcio_fisica',
        'roba',
        'altres',

        // estat persona
        'forma_fisica',
        'malalties_o_lesions',
        'medicacio',
        'limitacio_o_discapacitat',

        // vehicle
        'marca_model_vehicle',
        'color_vehicle',
        'matricula_vehicle',
    ];
}
