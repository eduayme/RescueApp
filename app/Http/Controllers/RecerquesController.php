<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Recerca;

class RecerquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recerques  = Recerca::all()->where('es_practica', '=', 0);
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
        if( Auth::check() ) {
          return view( 'recerques.create' );
        }
        else {
          return redirect()->action('HomeController@login');
        }
    }
}
