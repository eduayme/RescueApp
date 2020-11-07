<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::where('search_id', $request->get('search_id'))->get();

        return view('groups.index', compact('groups'));
    }

    public function create(Request $request)
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.resources.groups.create', ['search_id' => $request->get('search_id')]);
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
        $validator = Validator::make($request->all(), [
            'search_id'         => ['required', 'numeric', 'exists:searches,id'],
            'is_active'         => ['numeric', Rule::in([0, 1])],
            'vehicle'           => ['string', 'max:50'],
            'broadcast'         => ['string', 'max:50'],
            'gps'               => ['string', 'max:50'],
            'people_involved'   => ['string', 'max:255'],
        ], [
            'vehicle.max'                  => __('messages.max'),
            'broadcast.max'                => __('messages.max'),
            'gps.max'                      => __('messages.max'),
            'people_involved.max'          => __('messages.max'),
        ]);

        $group = Group::create([
            'search_id'         => $request->get('search_id'),
            'is_active'         => $request->get('is_active'),
            'vehicle'           => $request->get('vehicle'),
            'broadcast'         => $request->get('broadcast'),
            'gps'               => $request->get('gps'),
            'people_involved'   => $request->get('people_involved'),
        ]);

        $group->save();

        return redirect('searches/'.$group->search_id.'#nav-resources')
        ->with('success', __('group.group').' '.$group->id.__('messages.added'));
    }

    public function update(Group $group, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'is_active'         => ['numeric', Rule::in([0, 1])],
            'vehicle'           => ['string', 'max:50'],
            'broadcast'         => ['string', 'max:50'],
            'gps'               => ['string', 'max:50'],
            'people_involved'   => ['string', 'max:255'],
        ], [
            'vehicle.max'                  => __('messages.max'),
            'broadcast.max'                => __('messages.max'),
            'gps.max'                      => __('messages.max'),
            'people_involved.max'          => __('messages.max'),
        ]);

        $group->is_active = $request->has('is_active') ? $request->get('is_active') : $group->is_active;
        $group->vehicle = $request->has('vehicle') ? $request->get('vehicle') : $group->vehicle;
        $group->broadcast = $request->has('broadcast') ? $request->get('broadcast') : $group->broadcast;
        $group->gps = $request->has('gps') ? $request->get('gps') : $group->gps;
        $group->people_involved = $request->has('people_involved') ? $request->get('people_involved') : $group->people_involved;

        $group->save();

        return redirect('searches/'.$group->search_id.'#nav-resources')
        ->with('success', __('group.group').' '.$group->id.__('messages.updated'));
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin' && $group) {
            $group->delete();

            return redirect('searches/'.$group->search_id.'#nav-resources')
            ->with('success', __('group.group').' '.$group->id.__('messages.deleted'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }
}
