<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Log;
use Validator;

class GroupController extends Controller
{
    // Create new group
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_id'         => ['required', 'numeric', 'exists:searches,id'],
            'status'            => ['required', 'numeric', Rule::in([0, 1])],
            'vehicle'           => ['required', 'string', 'max:50'],
            'broadcast'         => ['required', 'string', 'max:50'],
            'gps'               => ['required', 'string', 'max:50'],
            'people_involved'   => ['required', 'string', 'max:255'],
        ], [
            'vehicle.required'             => __('messages.required'),
            'vehicle.max'                  => __('messages.max'),
            'broadcast.required'           => __('messages.required'),
            'broadcast.max'                => __('messages.max'),
            'gps.required'                 => __('messages.required'),
            'gps.max'                      => __('messages.max'),
            'people_involved.required'     => __('messages.required'),
            'people_involved.max'          => __('messages.max'),
        ]);

        if ($validator->fails()) {
            Log::error('errors->'.json_encode($validator->messages()));

            return response()->json($validator->messages(), 422);
        }

        $group = Group::create([
            'search_id'         => $request->get('search_id'),
            'status'            => $request->get('status'),
            'vehicle'           => $request->get('vehicle'),
            'broadcast'         => $request->get('broadcast'),
            'gps'               => $request->get('gps'),
            'people_involved'   => $request->get('people_involved'),
        ]);

        $group->save();

        return response('Success', 200);
    }

    // Get Groups by Search Id
    public function index(Request $request)
    {
        $data['data'] = Group::where('search_id', $request->get('search_id'))->get();

        return $data;
    }

    // Update Group by Group Id
    public function update(Group $group, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'            => ['required', 'numeric', Rule::in([0, 1])],
            'vehicle'           => ['required', 'string', 'max:50'],
            'broadcast'         => ['required', 'string', 'max:50'],
            'gps'               => ['required', 'string', 'max:50'],
            'people_involved'   => ['required', 'string', 'max:255'],
        ], [
            'vehicle.required'             => __('messages.required'),
            'vehicle.max'                  => __('messages.max'),
            'broadcast.required'           => __('messages.required'),
            'broadcast.max'                => __('messages.max'),
            'gps.required'                 => __('messages.required'),
            'gps.max'                      => __('messages.max'),
            'people_involved.required'     => __('messages.required'),
            'people_involved.max'          => __('messages.max'),
        ]);

        if ($validator->fails()) {
            Log::error('errors->'.json_encode($validator->messages()));

            return response()->json($validator->messages(), 422);
        }

        $group->status = $request->has('status') ? $request->get('status') : $user->status;
        $group->vehicle = $request->has('vehicle') ? $request->get('vehicle') : $user->vehicle;
        $group->broadcast = $request->has('broadcast') ? $request->get('broadcast') : $user->broadcast;
        $group->gps = $request->has('gps') ? $request->get('gps') : $user->gps;
        $group->people_involved = $request->has('people_involved') ? $request->get('people_involved') : $user->people_involved;

        $group->save();

        return response('Success', 200);
    }

    // Delete a Group by Group Id
    public function destroy($id)
    {
        $group = Group::find($id);

        if ($group) {
            if ($group->delete()) {
                return response('Success', 200);
            } else {
                return response()->json(['message'=> __('group.unable_to_delete')], 422);
            }
        } else {
            return response()->json(['message'=> __('group.group_not_found')], 422);
        }
    }
}
