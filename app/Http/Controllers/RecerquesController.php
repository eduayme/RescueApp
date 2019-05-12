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
            'es_practica'                  => 'required',
            'num_actuacio'                 => 'required|string|min:3|max:50',
            'estat'                        => 'required',
            'data_creacio'                 => 'required',
            'data_ultima_modificacio'      => 'required',
            'id_usuari_creacio'            => 'required',
            'id_usuari_ultima_modificacio' => 'required',
        ]);

        $recerca = new Recerca([
            'es_practica'                  => $request->get('es_practica'),
            'num_actuacio'                 => $request->get('num_actuacio'),
            'estat'                        => $request->get('estat'),
            'data_creacio'                 => $request->get('data_creacio'),
            'data_ultima_modificacio'      => $request->get('data_ultima_modificacio'),
            'id_usuari_creacio'            => $request->get('id_usuari_creacio'),
            'id_usuari_ultima_modificacio' => $request->get('id_usuari_ultima_modificacio'),
        ]);

        $recerca->save();

        return redirect()->route('index')
        ->with( 'success', $recerca->num_actuacio . __('messages.added') );
    }


}
