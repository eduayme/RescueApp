<?php

namespace App\Http\Controllers;

use App\Desaparegut;
use App\Recerca;
use Auth;
use Illuminate\Http\Request;

class DesaparegutsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->perfil;
            $recerca = Recerca::find($request->id_recerca);

            if ($currentUser != 'convidat') {
                return view('recerques.desaparegut.create', compact('recerca'));
            } else {
                return back()
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
            'nom' => 'required|string|min:3|max:50',
        ], [
            'nom.required' => __('messages.required'),
            'nom.min'      => __('messages.min'),
            'nom.max'      => __('messages.max'),
        ]);

        $desaparegut = new Desaparegut([
            'id'                       => $request->get('id'),
            'id_recerca'               => $request->get('id_recerca'),
            'nom'                      => $request->get('nom'),
            'nom_respon'               => $request->get('nom_respon'),
            'edat'                     => $request->get('edat'),
            'telefon'                  => $request->get('telefon'),
            'whatsapp_o_gps'           => $request->get('whatsapp_o_gps'),
            'perfil'                   => $request->get('perfil'),
            'descripcio_fisica'        => $request->get('descripcio_fisica'),
            'roba'                     => $request->get('roba'),
            'altres'                   => $request->get('altres'),

            // estat persona
            'forma_fisica'             => $request->get('forma_fisica'),
            'malalties_o_lesions'      => $request->get('malalties_o_lesions'),
            'medicacio'                => $request->get('medicacio'),
            'limitacio_o_discapacitat' => $request->get('limitacio_o_discapacitat'),

            // vehicle
            'marca_model_vehicle'      => $request->get('marca_model_vehicle'),
            'color_vehicle'            => $request->get('color_vehicle'),
            'matricula_vehicle'        => $request->get('matricula_vehicle'),
        ]);

        $desaparegut->save();

        return redirect('recerques/'.$desaparegut->id_recerca)
        ->with('success', $desaparegut->nom.__('messages.added'));
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
        $desaparegut = Desaparegut::find($id);

        return view('recerques.desaparegut.view', compact('desaparegut'));
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
        $desaparegut = Desaparegut::find($id);
        $currentUser = \Auth::user()->perfil;

        if ($currentUser != 'convidat') {
            $desaparegut->delete();

            return redirect('recerques/'.$id)
            ->with('success', __('messages.deleted'));
        } else {
            return redirect('recerques/'.$id_recerca)
            ->with('error', __('messages.not_allowed'));
        }
    }
}
