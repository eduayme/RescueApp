<?php

namespace App\Http\Controllers;

use App\ActionPlan;
use App\ToDoTaskAP;
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
        $action_plans = ActionPlan::where('search_id', $id)->orderBy('version', 'desc')->first();
        $v = ActionPlan::where('search_id', $id)->count() > 0 ? $action_plans->version : 0;

        $action_plan = new ActionPlan([
            'version'   => $v + 1,
            'search_id' => $id,
        ]);
        $action_plan->save();

        /* List of default tasks to do */
        $tasks = [
            'BD_personal',
            'BD_hospitals',
            'Phone_LP',
            'IMEI_LP',
            'Bank_LT',
            'Ask_PT',
        ];
        foreach ($tasks as $task) {
            $to_do_task = new ToDoTaskAP([
                'action_plan_id' => $action_plan->id,
                'name'           => $task,
                'state'          => 'to_do',
            ]);
            $to_do_task->save();
        }

        return redirect('searches/'.$id.'/#nav-ap')
        ->with('success', __('main.version').' '.$action_plan->version.__('messages.added'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ap = ActionPlan::find($id);
        $current_user_profile = \Auth::user()->profile;

        if ($current_user_profile != 'guest') {
            return view('searches.action_plan.ap_edit', compact('ap'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function update(Request $request, $id)
    {
        $ap = ActionPlan::find($id);

        $ap->description = $request->has('description') ? $request->get('description') : $ap->description;

        $ap->save();

        return redirect('searches/'.$ap->search_id.'/#nav-ap')
            ->with('success', __('main.version').' '.$ap->version.__('messages.updated'));
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
        $ap = ActionPlan::find($id);

        $currentUser = \Auth::user()->profile;

        if ($currentUser != 'guest') {
            $ap->delete();

            return redirect('searches/'.$ap->search_id.'/#nav-ap')
                ->with('success', __('main.version').' '.$ap->version.__('messages.deleted'));
        } else {
            return redirect('searches/'.$search->id)
                ->with('error', __('messages.not_allowed'));
        }
    }
}
