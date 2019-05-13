<?php

namespace App\Http\Controllers;

use App\Recerca;
use Carbon\Carbon;
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
            return view('recerques.create');
        } else {
            return redirect()->action('HomeController@login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_actuacio'                 => 'required|string|min:3|max:50',
        ]);

        $recerca = new Recerca([
            'es_practica'                  => $request->get('es_practica'),
            'num_actuacio'                 => $request->get('num_actuacio'),
            'regio'                        => $request->get('regio'),
            'estat'                        => $request->get('estat'),

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
            'tall_mapa'                    => $request->get('tall_mapa'),
            'soc_quadrant'                 => $request->get('soc_quadrant'),
            'seccio_mapa'                  => $request->get('seccio_mapa'),

            //desapareguts
            'desapareguts'                 => $request->get('desapareguts'),
            'estat_desapareguts'           => $request->get('estat_desapareguts'),

            //persona contacte
            'nom_persona_contacte'         => $request->get('nom_persona_contacte'),
            'telefon_persona_contacte'     => $request->get('telefon_persona_contacte'),
            'afinitat_persona_contacte'    => $request->get('afinitat_persona_contacte'),
        ]);

        $recerca->save();

        return redirect()->route('index')
        ->with( 'success', $recerca->num_actuacio . __('messages.added') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recerca = Recerca::find($id);

        return view( 'recerques.view', compact('recerca') );
    }

}
