<?php

namespace App\Http\Controllers;

use App\ActionPlan;
use App\ToDoTaskAP;
use Illuminate\Http\Request;

class ToDoTaskAPController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function update(Request $request, $id)
    {
        $to_do_task = ToDoTaskAP::find($id);
        $ap = ActionPlan::find($to_do_task->action_plan_id);

        $to_do_task->state = $request->has('state') ? $request->get('state') : $to_do_task->state;
        $to_do_task->description = $request->has('description') ? $request->get('description') : $to_do_task->description;

        $to_do_task->save();

        return redirect('searches/'.$ap->search_id.'/#nav-ap')
        ->with('success', $to_do_task->description.__('messages.updated'));
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
        $to_do_task = ToDoTaskAP::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin') {
            $to_do_task->delete();

            return back()
            ->with('success', $to_do_task->description.__('messages.deleted'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }
}
