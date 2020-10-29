<?php

namespace App\Http\Controllers;

use App\Leader;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Log;
use Validator;

class LeaderController extends Controller
{
    // Create new leader
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_id'             => ['required', 'numeric', 'exists:searches,id'],            
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
            Log::error('errors->'.json_encode($validator->messages()));

            return response()->json($validator->messages(), 422);
        }

        $leader = Leader::create([
            'search_id'         => $request->get('search_id'),
            'leader_code'       => $request->get('leaderCode'),
            'name'              => $request->get('name'),
            'phone'             => $request->get('phone'),
            'start'             => $request->get('start'),
            'end'               => $request->get('end')
        ]);

        $leader->save();

        return response('Success', 200);
    }

    // Get Leaders by Search Id
    public function index(Request $request)
    {
        $data['data'] = Leader::where('search_id', $request->get('search_id'))->get();

        return $data;
    }

    // Update Leader by Leader Id
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
            Log::error('errors->'.json_encode($validator->messages()));

            return response()->json($validator->messages(), 422);
        }

        $leader->leader_code = $request->has('leaderCode') ? $request->get('leaderCode') : $user->leader_code;
        $leader->phone = $request->has('phone') ? $request->get('phone') : $user->phone;
        $leader->name = $request->has('name') ? $request->get('name') : $user->name;
        $leader->start = $request->has('start') ? $request->get('start') : $user->start;
        $leader->end = $request->has('end') ? $request->get('end') : $user->end;

        $leader->save();

        return response('Success', 200);
    }

    // Delete a Leader by Leader Id
    public function destroy($id)
    {
        $leader = Leader::find($id);

        if ($leader) {
            if ($leader->delete()) {
                return response('Success', 200);
            } else {
                return response()->json(['message'=> __('leader.unable_to_delete')], 422);
            }
        } else {
            return response()->json(['message'=> __('leader.leader_not_found')], 422);
        }
    }
}
