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

        'data_inici',
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

        //desapareguts
        'numero_desapareguts',
        'estat_desapareguts',

        //equipament i experiència
        'coneix_zona',
        'experiencia_activitat',
        'porta_aigua',
        'porta_menjar',
        'medicament_necessari',
        'porta_llum',
        'roba_abric',
        'roba_impermeable',

        //persona contacte
        'nom_persona_contacte',
        'telefon_persona_contacte',
        'afinitat_persona_contacte',

        //tancament
        'grup_treball_utilitzat',
        'derivacio_cossos_lliurades',
        'derivacio_cossos_codi_receptor',
        'comandament_inicial',
        'comandament_relleus',
        'comandament_final',
        'tipologia',
        'recursos',
        'data_localitzacio',
        'toponim_localitzacio',
        'indret_localitzacio',
        'terme_municipal_localitzacio',
        'tall_coe_localitzacio',
        'soc_localitzacio',
        'seccio_localitzacio',
        'utm_x_localitzacio',
        'utm_y_localitzacio',
        'distancia_upa_localitzacio',
        'qui_fa_localitzacio',
        'estat_troben',
        'motiu_finalitzacio',
        'ip_comandament_finalitza',
        'durada',
    ];

    public function user_creator()
    {
        return $this->belongsTo('App\User', 'id_usuari_creacio', 'id');
    }

    public function user_last_modification()
    {
        return $this->belongsTo('App\User', 'id_usuari_ultima_modificacio', 'id');
    }
}
