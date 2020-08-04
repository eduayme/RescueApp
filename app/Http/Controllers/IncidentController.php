<?php

namespace App\Http\Controllers;

use App\Incident;
use App\IncidentImage;
use Auth;
use Illuminate\Http\Request;

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
                return redirect('searches/'.$incident->search_id)
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
            'photo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ], [
            'photo.image'   => __('messages.image'),
            'photo.mimes'   => __('messages.mimes'),
            'photo.max'     => __('messages.photo_max'),
        ]);

        $incident = new Incident([
            'search_id'            => $request->get('search_id'),
            'user_creation_id'     => $request->get('user_creation_id'),
            'user_modification_id' => $request->get('user_modification_id'),
            'date'                 => $request->get('date'),
            'description'          => $request->get('description'),
        ]);
        $incident->save();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/uploads/incidents_photos/'.$filename));
                $data[] = $filename;
            }

            $incident_image = new IncidentImage([
                'photo'       => $filename,
                'incident_id' => $incident->id,
            ]);

            $incident_image->save();
        }

        return redirect('searches/'.$incident->search_id.'#nav-incidents')
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

        return redirect('searches/'.$incident->search_id.'#nav-incidents')
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
