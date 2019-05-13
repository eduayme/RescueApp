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
        'regio',
        'estat',

        'data_creacio',
        'data_ultima_modificacio',
        'data_tancament',

        'id_usuari_creacio',
        'id_usuari_ultima_modificacio',
        'id_usuari_tancament',

        //alertant
        'es_desaparegut',
        'es_contacte',
        'nom_alertant',
        'edat_alertant',
        'telefon_alertant',
        'adreca_alertant',

        //incident
        'municipi_upa',
        'data_upa',
        'zona_incident',
        'possible_ruta',
        'descripcio_incident',
        'tall_mapa',
        'soc_quadrant',
        'seccio_mapa',

        //desapareguts
        'desapareguts',
        'estat_desapareguts',

        //persona contacte
        'nom_persona_contacte',
        'telefon_persona_contacte',
        'afinitat_persona_contacte'
    ];
}
