<?php

namespace App\Http\Controllers;

use App\Leader;
use Illuminate\Http\Request;
use Log;
use Validator;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::where('search_id', $request->get('search_id'))->get();

        return view('leaders.index', compact('leaders'));
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

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)
            ->with('error', __('messages.error_form'));
        }

        $leader = Leader::create([
            'search_id'         => $request->get('search_id'),
            'leader_code'       => $request->get('leaderCode'),
            'name'              => $request->get('name'),
            'phone'             => $request->get('phone'),
            'start'             => $request->get('start'),
            'end'               => $request->get('end'),
        ]);
        $leader->save();

        return back()
        ->with('success', __('leader.leader').' '.$leader->id.__('messages.added'));
    }

    public function update(Leader $leader, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'leaderCode'            => ['required', 'string', 'max:255'],
            'name'                  => ['required', 'string', 'max:255'],
            'phone'                 => ['sometimes', 'string', 'max:50'],
        ], [
            'name.required'         => __('messages.required'),
            'name.max'              => __('messages.max'),
            'leaderCode.required'   => __('messages.required'),
            'leaderCode.max'        => __('messages.max'),
            'phone.max'             => __('messages.max'),
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)
            ->with('error', __('messages.error_form'));
        }

        $leader->leader_code = $request->has('leaderCode') ? $request->get('leaderCode') : $user->leader_code;
        $leader->phone = $request->has('phone') ? $request->get('phone') : $user->phone;
        $leader->name = $request->has('name') ? $request->get('name') : $user->name;
        $leader->start = $request->has('start') ? $request->get('start') : $user->start;
        $leader->end = $request->has('end') ? $request->get('end') : $user->end;

        $leader->save();

        return back()
        ->with('success', __('leader.leader').' '.$leader->id.__('messages.updated'));
    }

    public function destroy($id)
    {
        $leader = Leader::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin' && $leader) {
            $leader->delete();

            return back()
            ->with('success', __('leader.leader').' '.$leader->id.__('messages.deleted'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }
}
