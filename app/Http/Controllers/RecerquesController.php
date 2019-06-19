<?php

namespace App\Http\Controllers;

use App\Recerca;
use Auth;
use Illuminate\Http\Request;
use Validator;

class RecerquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recerques = Recerca::all()->where('es_practica', '=', 0);
        $practiques = Recerca::all()->where('es_practica', '=', 1);

        return view('recerques.index', compact('recerques', 'practiques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->perfil;

            if ($currentUser != 'convidat') {
                return view('recerques.create');
            } else {
                return redirect('/')
              ->with('error', __('messages.not_allowed'));
            }
        } else {
            return redirect()->action('HomeController@login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_actuacio' => 'required|string|min:3|max:50|unique:recerques',
        ], [
            'num_actuacio.required' => __('messages.required'),
            'num_actuacio.min'      => __('messages.min'),
            'num_actuacio.max'      => __('messages.max'),
            'num_actuacio.unique'   => __('messages.unique'),
        ]);

        $recerca = new Recerca([
            'es_practica'                  => $request->get('es_practica'),
            'num_actuacio'                 => $request->get('num_actuacio'),
            'regio'                        => $request->get('regio'),
            'estat'                        => $request->get('estat'),

            'data_inici'                   => $request->get('data_inici'),
            'data_creacio'                 => $request->get('data_creacio'),
            'data_ultima_modificacio'      => $request->get('data_ultima_modificacio'),
            'data_tancament'               => $request->get('data_tancament'),

            'id_usuari_creacio'            => $request->get('id_usuari_creacio'),
            'id_usuari_ultima_modificacio' => $request->get('id_usuari_ultima_modificacio'),
            'id_usuari_tancament'          => $request->get('id_usuari_tancament'),

            //alertant
            'es_desaparegut'               => $request->get('es_desaparegut'),
            'es_contacte'                  => $request->get('es_contacte'),
            'nom_alertant'                 => $request->get('nom_alertant'),
            'edat_alertant'                => $request->get('edat_alertant'),
            'telefon_alertant'             => $request->get('telefon_alertant'),
            'adreca_alertant'              => $request->get('adreca_alertant'),

            //incident
            'municipi_upa'                 => $request->get('municipi_upa'),
            'data_upa'                     => $request->get('data_upa'),
            'zona_incident'                => $request->get('zona_incident'),
            'possible_ruta'                => $request->get('possible_ruta'),
            'descripcio_incident'          => $request->get('descripcio_incident'),

            //desapareguts
            'numero_desapareguts'          => $request->get('numero_desapareguts'),
            'estat_desapareguts'           => $request->get('estat_desapareguts'),

            //equipament i experiència
            'coneix_zona'                  => $request->get('coneix_zona'),
            'experiencia_activitat'        => $request->get('experiencia_activitat'),
            'porta_aigua'                  => $request->get('porta_aigua'),
            'porta_menjar'                 => $request->get('porta_menjar'),
            'medicament_necessari'         => $request->get('medicament_necessari'),
            'porta_llum'                   => $request->get('porta_llum'),
            'roba_abric'                   => $request->get('roba_abric'),
            'roba_impermeable'             => $request->get('roba_impermeable'),

            //persona contacte
            'nom_persona_contacte'         => $request->get('nom_persona_contacte'),
            'telefon_persona_contacte'     => $request->get('telefon_persona_contacte'),
            'afinitat_persona_contacte'    => $request->get('afinitat_persona_contacte'),
        ]);

        $recerca->save();

        return redirect('recerques/'.$recerca->id)
        ->with('success', $recerca->num_actuacio.__('messages.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recerca = Recerca::find($id);

        return view('recerques.view', compact('recerca'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recerca = Recerca::find($id);

        $currentUser = \Auth::user()->perfil;

        if ($currentUser != 'convidat') {
            $recerca->delete();

            return redirect('/')
            ->with('success', $recerca->num_actuacio.__('messages.deleted'));
        } else {
            return redirect('recerques/'.$recerca->id)
            ->with('error', __('messages.not_allowed'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recerca = Recerca::find($id);

        $currentUser = \Auth::user()->perfil;

        if ($currentUser != 'convidat') {
            return view('recerques.edit', compact('recerca'));
        } else {
            return redirect('recerques/'.$recerca->id)
            ->with('error', __('messages.not_allowed'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recerca = Recerca::find($id);

        $request->validate([
            'num_actuacio' => 'required|string|min:3|max:50|unique:recerques,num_actuacio,'.$id,
        ], [
            'num_actuacio.required' => __('messages.required'),
            'num_actuacio.min'      => __('messages.min'),
            'num_actuacio.max'      => __('messages.max'),
            'num_actuacio.unique'   => __('messages.unique'),
        ]);

        //dades recerca
        $recerca->es_practica = $request->has('es_practica') ? $request->get('es_practica') : $recerca->es_practica;
        $recerca->num_actuacio = $request->has('num_actuacio') ? $request->get('num_actuacio') : $recerca->num_actuacio;
        $recerca->regio = $request->has('regio') ? $request->get('regio') : $recerca->regio;
        $recerca->estat = $request->has('estat') ? $request->get('estat') : $recerca->estat;

        $recerca->data_inici = $request->has('data_inici') ? $request->get('data_inici') : $recerca->data_inici;
        $recerca->data_creacio = $request->has('data_creacio') ? $request->get('data_creacio') : $recerca->data_creacio;
        $recerca->data_ultima_modificacio = $request->has('data_ultima_modificacio') ? $request->get('data_ultima_modificacio') : $recerca->data_ultima_modificacio;
        $recerca->data_tancament = $request->has('data_tancament') ? $request->get('data_tancament') : $recerca->data_tancament;

        $recerca->id_usuari_creacio = $request->has('id_usuari_creacio') ? $request->get('id_usuari_creacio') : $recerca->id_usuari_creacio;
        $recerca->id_usuari_ultima_modificacio = $request->has('id_usuari_ultima_modificacio') ? $request->get('id_usuari_ultima_modificacio') : $recerca->id_usuari_ultima_modificacio;
        $recerca->id_usuari_tancament = $request->has('id_usuari_tancament') ? $request->get('id_usuari_tancament') : $recerca->id_usuari_tancament;

        //alertant
        $recerca->es_desaparegut = $request->has('es_desaparegut') ? $request->get('es_desaparegut') : $recerca->es_desaparegut;
        $recerca->es_contacte = $request->has('es_contacte') ? $request->get('es_contacte') : $recerca->es_contacte;
        $recerca->nom_alertant = $request->has('nom_alertant') ? $request->get('nom_alertant') : $recerca->nom_alertant;
        $recerca->edat_alertant = $request->has('edat_alertant') ? $request->get('edat_alertant') : $recerca->edat_alertant;
        $recerca->telefon_alertant = $request->has('telefon_alertant') ? $request->get('telefon_alertant') : $recerca->telefon_alertant;
        $recerca->adreca_alertant = $request->has('adreca_alertant') ? $request->get('adreca_alertant') : $recerca->adreca_alertant;

        //incident
        $recerca->municipi_upa = $request->has('municipi_upa') ? $request->get('municipi_upa') : $recerca->municipi_upa;
        $recerca->data_upa = $request->has('data_upa') ? $request->get('data_upa') : $recerca->data_upa;
        $recerca->zona_incident = $request->has('zona_incident') ? $request->get('zona_incident') : $recerca->zona_incident;
        $recerca->possible_ruta = $request->has('possible_ruta') ? $request->get('possible_ruta') : $recerca->possible_ruta;
        $recerca->descripcio_incident = $request->has('descripcio_incident') ? $request->get('descripcio_incident') : $recerca->descripcio_incident;

        //desapareguts
        $recerca->numero_desapareguts = $request->has('numero_desapareguts') ? $request->get('numero_desapareguts') : $recerca->numero_desapareguts;
        $recerca->estat_desapareguts = $request->has('estat_desapareguts') ? $request->get('estat_desapareguts') : $recerca->estat_desapareguts;

        //equipament i experiència
        $recerca->coneix_zona = $request->has('coneix_zona') ? $request->get('coneix_zona') : $recerca->coneix_zona;
        $recerca->experiencia_activitat = $request->has('experiencia_activitat') ? $request->get('experiencia_activitat') : $recerca->experiencia_activitat;
        $recerca->porta_aigua = $request->has('porta_aigua') ? $request->get('porta_aigua') : $recerca->experiencia_activitat;
        $recerca->porta_menjar = $request->has('porta_menjar') ? $request->get('porta_menjar') : $recerca->porta_menjar;
        $recerca->medicament_necessari = $request->has('medicament_necessari') ? $request->get('medicament_necessari') : $recerca->medicament_necessari;
        $recerca->porta_llum = $request->has('porta_llum') ? $request->get('porta_llum') : $recerca->porta_llum;
        $recerca->roba_abric = $request->has('roba_abric') ? $request->get('roba_abric') : $recerca->roba_abric;
        $recerca->roba_impermeable = $request->has('roba_impermeable') ? $request->get('roba_impermeable') : $recerca->roba_impermeable;

        //persona contacte
        $recerca->nom_persona_contacte = $request->has('nom_persona_contacte') ? $request->get('nom_persona_contacte') : $recerca->nom_persona_contacte;
        $recerca->telefon_persona_contacte = $request->has('telefon_persona_contacte') ? $request->get('telefon_persona_contacte') : $recerca->telefon_persona_contacte;
        $recerca->afinitat_persona_contacte = $request->has('afinitat_persona_contacte') ? $request->get('afinitat_persona_contacte') : $recerca->afinitat_persona_contacte;

        //tancament
        $recerca->grup_treball_utilitzat = $request->has('grup_treball_utilitzat') ? $request->get('grup_treball_utilitzat') : $recerca->grup_treball_utilitzat;
        $recerca->derivacio_cossos_lliurades = $request->has('derivacio_cossos_lliurades') ? $request->get('derivacio_cossos_lliurades') : $recerca->derivacio_cossos_lliurades;
        $recerca->derivacio_cossos_codi_receptor = $request->has('derivacio_cossos_codi_receptor') ? $request->get('derivacio_cossos_codi_receptor') : $recerca->derivacio_cossos_codi_receptor;
        $recerca->comandament_inicial = $request->has('comandament_inicial') ? $request->get('comandament_inicial') : $recerca->comandament_inicial;
        $recerca->comandament_relleus = $request->has('comandament_relleus') ? $request->get('comandament_relleus') : $recerca->comandament_relleus;
        $recerca->comandament_final = $request->has('comandament_final') ? $request->get('comandament_final') : $recerca->comandament_final;
        $recerca->tipologia = $request->has('tipologia') ? $request->get('tipologia') : $recerca->tipologia;
        $recerca->recursos = $request->has('recursos') ? $request->get('recursos') : $recerca->recursos;
        $recerca->data_localitzacio = $request->has('data_localitzacio') ? $request->get('data_localitzacio') : $recerca->data_localitzacio;
        $recerca->toponim_localitzacio = $request->has('toponim_localitzacio') ? $request->get('toponim_localitzacio') : $recerca->toponim_localitzacio;
        $recerca->indret_localitzacio = $request->has('indret_localitzacio') ? $request->get('indret_localitzacio') : $recerca->indret_localitzacio;
        $recerca->terme_municipal_localitzacio = $request->has('terme_municipal_localitzacio') ? $request->get('terme_municipal_localitzacio') : $recerca->terme_municipal_localitzacio;
        $recerca->tall_coe_localitzacio = $request->has('tall_coe_localitzacio') ? $request->get('tall_coe_localitzacio') : $recerca->tall_coe_localitzacio;
        $recerca->soc_localitzacio = $request->has('soc_localitzacio') ? $request->get('soc_localitzacio') : $recerca->soc_localitzacio;
        $recerca->seccio_localitzacio = $request->has('seccio_localitzacio') ? $request->get('seccio_localitzacio') : $recerca->seccio_localitzacio;
        $recerca->utm_x_localitzacio = $request->has('utm_x_localitzacio') ? $request->get('utm_x_localitzacio') : $recerca->utm_x_localitzacio;
        $recerca->utm_y_localitzacio = $request->has('utm_y_localitzacio') ? $request->get('utm_y_localitzacio') : $recerca->utm_y_localitzacio;
        $recerca->distancia_upa_localitzacio = $request->has('distancia_upa_localitzacio') ? $request->get('distancia_upa_localitzacio') : $recerca->distancia_upa_localitzacio;
        $recerca->qui_fa_localitzacio = $request->has('qui_fa_localitzacio') ? $request->get('qui_fa_localitzacio') : $recerca->qui_fa_localitzacio;
        $recerca->estat_troben = $request->has('estat_troben') ? $request->get('estat_troben') : $recerca->estat_troben;
        $recerca->motiu_finalitzacio = $request->has('motiu_finalitzacio') ? $request->get('motiu_finalitzacio') : $recerca->motiu_finalitzacio;

        // If search open and we want to close it
        if ($request->has('closebutton')) {
            $validator = Validator::make($request->all(), [
                'grup_treball_utilitzat'         => 'required',
                'derivacio_cossos_lliurades'     => 'required',
                'derivacio_cossos_codi_receptor' => 'required',
                'comandament_inicial'            => 'required',
                'comandament_relleus'            => 'required',
                'comandament_final'              => 'required',
                'tipologia'                      => 'required',
                'recursos'                       => 'required',
                'data_localitzacio'              => 'required',
                'toponim_localitzacio'           => 'required',
                'indret_localitzacio'            => 'required',
                'terme_municipal_localitzacio'   => 'required',
                'tall_coe_localitzacio'          => 'required',
                'soc_localitzacio'               => 'required',
                'seccio_localitzacio'            => 'required',
                'utm_x_localitzacio'             => 'required',
                'utm_y_localitzacio'             => 'required',
                'distancia_upa_localitzacio'     => 'required',
                'qui_fa_localitzacio'            => 'required',
                'estat_troben'                   => 'required',
                'motiu_finalitzacio'             => 'required',
            ], [
                'grup_treball_utilitzat.required'         => __('messages.required'),
                'derivacio_cossos_lliurades.required'     => __('messages.required'),
                'derivacio_cossos_lliurades.required'     => __('messages.required'),
                'derivacio_cossos_codi_receptor.required' => __('messages.required'),
                'comandament_inicial.required'            => __('messages.required'),
                'comandament_relleus.required'            => __('messages.required'),
                'comandament_final.required'              => __('messages.required'),
                'tipologia.required'                      => __('messages.required'),
                'recursos.required'                       => __('messages.required'),
                'data_localitzacio.required'              => __('messages.required'),
                'toponim_localitzacio.required'           => __('messages.required'),
                'indret_localitzacio.required'            => __('messages.required'),
                'terme_municipal_localitzacio.required'   => __('messages.required'),
                'tall_coe_localitzacio.required'          => __('messages.required'),
                'soc_localitzacio.required'               => __('messages.required'),
                'seccio_localitzacio.required'            => __('messages.required'),
                'utm_x_localitzacio.required'             => __('messages.required'),
                'utm_y_localitzacio.required'             => __('messages.required'),
                'distancia_upa_localitzacio.required'     => __('messages.required'),
                'qui_fa_localitzacio.required'            => __('messages.required'),
                'estat_troben.required'                   => __('messages.required'),
                'motiu_finalitzacio.required'             => __('messages.required'),
            ]);
            if ($validator->fails()) {
                return redirect('recerques/'.$recerca->id.'#nav-closing')
                     ->withErrors($validator)->withInput();
            }

            $recerca->id_usuari_tancament = \Auth::user()->id;
            $recerca->data_tancament = date('Y-m-d H:i:s');
            $recerca->estat = 'Tancada';
        }

        // If search close and we want to open it
        elseif ($request->has('openbutton')) {
            $recerca->id_usuari_tancament = null;
            $recerca->data_tancament = null;
            $recerca->estat = 'Oberta';
        }

        $recerca->save();

        return redirect('recerques/'.$recerca->id)
        ->with('success', $recerca->num_actuacio.__('messages.updated'));
    }
}
