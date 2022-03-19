<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\Group\StoreUpdateRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::where('search_id', $request->get('search_id'))->get();

        return view('groups.index', compact('groups'));
    }

    public function create(Request $request)
    {
        if (auth()->user()->profile != 'guest') {
            return view('searches.resources.groups.create', ['search_id' => $request->get('search_id')]);
        }
        
        return back()->with('error', __('messages.not_allowed')); 
    }

    public function store(StoreUpdateRequest $request)
    {
        $group = Group::create([
            'search_id'         => $request->search_id,
            'is_active'         => $request->is_active,
            'vehicle'           => $request->vehicle,
            'broadcast'         => $request->broadcast,
            'gps'               => $request->gps,
            'people_involved'   => $request->people_involved,
        ]);

        return redirect('searches/'.$group->search_id.'#nav-resources')
            ->with('success', __('group.group').' '.$group->id.__('messages.added'));
    }

    public function update(Group $group, StoreUpdateRequest $request)
    {
        $group->is_active = $request->is_active;
        $group->vehicle = $request->vehicle;
        $group->broadcast = $request->broadcast;
        $group->gps = $request->gps;
        $group->people_involved = $request->people_involved;

        $group->update();

        return redirect('searches/'.$group->search_id.'#nav-resources')
        ->with('success', __('group.group').' '.$group->id.__('messages.updated'));
    }

    public function destroy(Group $group)
    {
        if (auth()->user()->profile == 'admin') {
            $group->delete();

            return redirect('searches/'.$group->search_id.'#nav-resources')
            ->with('success', __('group.group').' '.$group->id.__('messages.deleted'));
        }

        return back()->with('error', __('messages.not_allowed'));
    }
}
