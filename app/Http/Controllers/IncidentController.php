<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use Auth;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();

        return view('searches.incidents.index', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.incidents.create');
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
        $incident = new Incident([
            'search_id'            => $request->get('search_id'),
            'user_creation_id'     => $request->get('user_creation_id'),
            'user_modification_id' => $request->get('user_modification_id'),
            'date'                 => $request->get('date'),
            'description'          => $request->get('description'),
        ]);

        $incident->save();

        return redirect('searches/'.$incident->id_search)
        ->with('success', __('main.incident').' '.__('messages.added'));
    }

    public function update(Request $request, $id)
    {
        $incident = Incident::find($id);

        $incident->search_id = $request->get('search_id');
        $incident->user_creation_id = $request->get('user_creation_id');
        $incident->user_modification_id = $request->get('user_modification_id');
        $incident->date = $request->get('date');
        $incident->description = $request->get('description');

        $incident->save();

        return redirect('searches/'.$incident->search_id)
        ->with('success', __('main.incident').' '.__('messages.updated'));
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
        $incident = Incident::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin') {
            $incident->delete();

            return back()
            ->with('success', $incident->id.__('messages.deleted'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }
}
