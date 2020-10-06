<?php

namespace App\Http\Controllers;

use App\InvolvedPerson;
use App\Search;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class InvolvedPersonController extends Controller
{
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
            'name' => 'required|string|min:2|max:50',
        ], [
            'name.required' => __('messages.required'),
            'name.min'      => __('messages.min'),
            'name.max'      => __('messages.max'),
        ]);

        $involved_person = new InvolvedPerson([
            'search_id'     => $request->get('search_id'),
            'name'          => $request->get('name'),
            'total_people'  => $request->get('total_people'),
            'vehicle'       => $request->get('vehicle'),
            'phone_number'  => $request->get('phone'),
            'people'        => $request->get('people'),
        ]);

        $involved_person->user_creation_id = \Auth::user()->id;
        $involved_person->user_modification_id = \Auth::user()->id;

        $involved_person->save();

        Session::flash('success', 'Adding '.$involved_person->name.' to involved people was successfull.');

        return response('Adding '.$involved_person->name.' to involved people was successfull.', Response::HTTP_OK);
    }

    /**
     * Updates a resoruce.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $involved = InvolvedPerson::find($id);
        $involved->name = $request->has('name') ? $request->get('name') : $involved->name;
        $involved->total_people = $request->has('total_people') ? $request->get('total_people') : $involved->total_people;
        $involved->vehicle = $request->has('vehicle') ? $request->get('vehicle') : $involved->vehicle;
        $involved->phone_number = $request->has('phone') ? $request->get('phone') : $involved->phone;
        $involved->people = $request->has('people') ? $request->get('people') : $involved->people;
        $involved->user_modification_id = \Auth::user()->id;
        $involved->save();

        return redirect('searches/'.$involved->search_id.'#nav-resources')
            ->with('success', __('main.people_involved').' '.$involved->id.__('messages.updated'));
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
        $involved_person = InvolvedPerson::find($id);
        $search = Search::find($involved_person->search_id);

        return view('searches.resources.people.view', compact('involved_person', 'search'));
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
        $involved_person = InvolvedPerson::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin') {
            $involved_person->delete();

            return redirect('searches/'.$involved_person->search_id.'#nav-resources')
                ->with('success', __('main.people_involved').' '.$involved_person->id.__('messages.deleted'));
        } else {
            return back()
                ->with('error', __('messages.not_allowed'));
        }
    }
}
