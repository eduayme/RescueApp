<?php

namespace App\Http\Controllers;

use App\InvolvedPerson;
use Auth;
use Illuminate\Http\Request;

class InvolvedPersonController extends Controller
{
    public function index()
    {
        $involved_people = InvolvedPerson::where('search_id', $request->get('search_id'))->get();

        return view('searches.resources.involved_people.index', compact('involved_people'));
    }

    public function create(Request $request)
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.resources.involved_people.create', ['search_id' => $request->get('search_id')]);
            } else {
                return back()
                ->with('error', __('messages.not_allowed'));
            }
        } else {
            return redirect()->action('HomeController@login');
        }
    }

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
            'phone_number'  => $request->get('phone_number'),
            'people'        => $request->get('people'),
        ]);
        $involved_person->user_creation_id = \Auth::user()->id;
        $involved_person->user_modification_id = \Auth::user()->id;

        $involved_person->save();

        return redirect('searches/'.$involved_person->search_id.'#nav-resources')
            ->with('success', $involved_person->name.__('messages.added'));
    }

    public function update(Request $request, $id)
    {
        $involved_person = InvolvedPerson::find($id);

        $involved_person->name = $request->has('name') ? $request->get('name') : $involved_person->name;
        $involved_person->total_people = $request->has('total_people') ? $request->get('total_people') : $involved_person->total_people;
        $involved_person->vehicle = $request->has('vehicle') ? $request->get('vehicle') : $involved_person->vehicle;
        $involved_person->phone_number = $request->has('phone_number') ? $request->get('phone_number') : $involved_person->phone_number;
        $involved_person->people = $request->has('people') ? $request->get('people') : $involved_person->people;
        $involved_person->user_modification_id = \Auth::user()->id;
        $involved_person->save();

        return redirect('searches/'.$involved_person->search_id.'#nav-resources')
            ->with('success', $involved_person->name.__('messages.updated'));
    }

    public function destroy($id)
    {
        $involved_person = InvolvedPerson::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin') {
            $involved_person->delete();

            return redirect('searches/'.$involved_person->search_id.'#nav-resources')
                ->with('success', $involved_person->name.__('messages.deleted'));
        } else {
            return back()
                ->with('error', __('messages.not_allowed'));
        }
    }
}
