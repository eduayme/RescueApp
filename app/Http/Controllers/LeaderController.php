<?php

namespace App\Http\Controllers;

use App\Leader;
use Auth;
use Illuminate\Http\Request;
use Validator;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::where('search_id', $request->get('search_id'))->get();

        return view('searches.resources.leaders.index', compact('leaders'));
    }

    public function create(Request $request)
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.resources.leaders.create', ['search_id' => $request->get('search_id')]);
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
            'search_id'             => ['required', 'numeric', 'exists:searches,id'],
            'leaderCode'            => ['required', 'string', 'max:255'],
            'name'                  => ['string', 'max:255'],
            'phone'                 => ['string', 'max:50'],
        ], [
            'leaderCode.required'   => __('messages.required'),
            'leaderCode.max'        => __('messages.max'),
            'name.max'              => __('messages.max'),
            'phone.max'             => __('messages.max'),
        ]);

        $leader = Leader::create([
            'search_id'         => $request->get('search_id'),
            'leader_code'       => $request->get('leader_code'),
            'name'              => $request->get('name'),
            'phone'             => $request->get('phone'),
            'start'             => $request->get('start'),
            'end'               => $request->get('end'),
        ]);
        $leader->save();

        return redirect('searches/'.$leader->search_id.'#nav-resources')
        ->with('success', __('leader.leader').' '.$leader->id.__('messages.added'));
    }

    public function update(Leader $leader, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'leader_code'            => ['required', 'string', 'max:255'],
            'name'                   => ['required', 'string', 'max:255'],
            'phone'                  => ['sometimes', 'string', 'max:50'],
        ], [
            'name.required'          => __('messages.required'),
            'name.max'               => __('messages.max'),
            'leader_code.required'   => __('messages.required'),
            'leader_code.max'        => __('messages.max'),
            'phone.max'              => __('messages.max'),
        ]);

        $leader->leader_code = $request->has('leader_code') ? $request->get('leader_code') : $leader->leader_code;
        $leader->phone = $request->has('phone') ? $request->get('phone') : $leader->phone;
        $leader->name = $request->has('name') ? $request->get('name') : $leader->name;
        $leader->start = $request->has('start') ? $request->get('start') : $leader->start;
        $leader->end = $request->has('end') ? $request->get('end') : $leader->end;

        $leader->save();

        return redirect('searches/'.$leader->search_id.'#nav-resources')
        ->with('success', __('leader.leader').' '.$leader->id.__('messages.updated'));
    }

    public function destroy($id)
    {
        $leader = Leader::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin' && $leader) {
            $leader->delete();

            return redirect('searches/'.$leader->search_id.'#nav-resources')
            ->with('success', __('leader.leader').' '.$leader->id.__('messages.deleted'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }
}
