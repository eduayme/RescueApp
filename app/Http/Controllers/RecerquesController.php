<?php

namespace App\Http\Controllers;

use App\Recerca;
use Auth;
use Illuminate\Http\Request;

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
        $request->validate([
            'num_actuacio' => 'required|string|min:3|max:50|unique:recerques,num_actuacio,'.$id,
        ], [
            'num_actuacio.required' => __('messages.required'),
            'num_actuacio.min'      => __('messages.min'),
            'num_actuacio.max'      => __('messages.max'),
            'num_actuacio.unique'   => __('messages.unique'),
        ]);

        $recerca = Recerca::find($id);

        //dades recerca
        $recerca->es_practica = $request->get('es_practica');
        $recerca->num_actuacio = $request->get('num_actuacio');
        $recerca->regio = $request->get('regio');
        $recerca->estat = $request->get('estat');

        $recerca->data_inici = $request->get('data_inici');
        $recerca->data_creacio = $request->get('data_creacio');
        $recerca->data_ultima_modificacio = $request->get('data_ultima_modificacio');
        $recerca->data_tancament = $request->get('data_tancament');

        $recerca->id_usuari_creacio = $request->get('id_usuari_creacio');
        $recerca->id_usuari_ultima_modificacio = $request->get('id_usuari_ultima_modificacio');
        $recerca->id_usuari_tancament = $request->get('id_usuari_tancament');

        //alertant
        $recerca->es_desaparegut = $request->get('es_desaparegut');
        $recerca->es_contacte = $request->get('es_contacte');
        $recerca->nom_alertant = $request->get('nom_alertant');
        $recerca->edat_alertant = $request->get('edat_alertant');
        $recerca->telefon_alertant = $request->get('telefon_alertant');
        $recerca->adreca_alertant = $request->get('adreca_alertant');

        //incident
        $recerca->municipi_upa = $request->get('municipi_upa');
        $recerca->data_upa = $request->get('data_upa');
        $recerca->zona_incident = $request->get('zona_incident');
        $recerca->possible_ruta = $request->get('possible_ruta');
        $recerca->descripcio_incident = $request->get('descripcio_incident');

        //desapareguts
        $recerca->numero_desapareguts = $request->get('numero_desapareguts');
        $recerca->estat_desapareguts = $request->get('estat_desapareguts');

        //equipament i experiència
        $recerca->coneix_zona = $request->get('coneix_zona');
        $recerca->experiencia_activitat = $request->get('experiencia_activitat');
        $recerca->porta_aigua = $request->get('porta_aigua');
        $recerca->porta_menjar = $request->get('porta_menjar');
        $recerca->medicament_necessari = $request->get('medicament_necessari');
        $recerca->porta_llum = $request->get('porta_llum');
        $recerca->roba_abric = $request->get('roba_abric');
        $recerca->roba_impermeable = $request->get('roba_impermeable');

        //persona contacte
        $recerca->nom_persona_contacte = $request->get('nom_persona_contacte');
        $recerca->telefon_persona_contacte = $request->get('telefon_persona_contacte');
        $recerca->afinitat_persona_contacte = $request->get('afinitat_persona_contacte');

        $recerca->save();

        return redirect('recerques/'.$recerca->id)
        ->with('success', $recerca->num_actuacio.__('messages.updated'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function close(Request $request, $id)
    {
    }
}
