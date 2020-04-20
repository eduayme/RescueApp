<?php

namespace App\Http\Controllers;

use App\ActionPlans;
use Illuminate\Http\Request;

class ActionPlanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $action_plans = ActionPlans::where('search_id', $id)->count();

        $action_plan = new ActionPlans([
            'version'   => $action_plans + 1,
            'search_id' => $id,
        ]);

        $action_plan->save();

        return redirect('searches/'.$id.'/#nav-ap')
            ->with('success', __('main.version').' '.$action_plan->version.__('messages.added'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $version = $request->input('version');
        $action_plan = ActionPlans::where('search_id', '=', $id)->where('version', '=', $version)->first();

        if ($request->input('description')) {
            $action_plan->description = $request->input('description');
        }

        $action_plan->save();
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
        $ap = ActionPlans::find($id);
        $id_search = $ap->search_id;

        $currentUser = \Auth::user()->profile;

        if ($currentUser != 'guest') {
            $ap->delete();

            return redirect('searches/'.$id_search.'/#nav-ap')
                ->with('success', __('main.version').' '.$ap->version.__('messages.deleted'));
        } else {
            return redirect('searches/'.$search->id)
                ->with('error', __('messages.not_allowed'));
        }
    }
}
