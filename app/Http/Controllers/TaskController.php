<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

Use App\Task;

class TaskController extends Controller
{

    public function create($search_id)
    {
        if (\Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.tasks.create', [
                    'search_id' => $search_id
                ]);
            } else {
                return redirect('searches/'.$incident->search_id)
                ->with('error', __('messages.not_allowed'));
            }
        } else {
            return redirect()->action('HomeController@login');
        }
    }

    public function store(Request $request)
    {
    	$request->validate([
            'search_id' => 'required',
            'Sector' => 'required',
            'Status' => 'required',Rule::in(["to_do","in_progress","done"]),
            'Group' => 'required',
            'Start' => 'required|date',
            'End' => 'required|date|after:Start', 
            'Type' => 'required',
            'Description' => 'required'
    	],[
            'Sector.required'        => 'Please provide a sector.',
            'Status.required'          => 'Please select a state.',
            'Group.required'          => 'Please select a group.',
            'Start.required'         => 'Please provide a starting date for the task.',
            'Start.date'             => 'Please provide a valid date',
            'End.required'            => 'Please provide an ending date for the task.',
            'End.date'                => 'Please provide a valid date',
            'End.after:Start'         => 'Please select a date after the start date',
            'Type.required'           => 'Please select a provide a type.',
            'Description.required' => 'Please provide a description',
        ]);

    	$task = new Task([
            'search_id'            	=> $request->get('search_id'),
            'Sector'     			=> $request->get('Sector'),
            'Status' 				=> $request->get('Status'),
            'Group'                 => $request->get('Group'),
            'Start'          		=> $request->get('Start'),
            'End'					=> $request->get('End'),
            'Type'					=> $request->get('Type'),
            'Description'			=> $request->get('Description')
    	]);

        $task->save();

        return redirect('searches/'.$task->search_id.'#nav-tasks')
        ->with('success', __('main.task').' '.$task->id.__('messages.added'));
    }

    public function update(Request $request,Task $id)
    {
        $startDate = $request->input['Start'];

        $request->validate([
            'Sector' => 'required',
            'Status' => 'required',Rule::in(["to_do","in_progress","done"]),
            'Group' => 'required',
            'Start' => 'required|date',
            'End' => 'required|date|after:Start', 
            'Type' => 'required',
            'Description' => 'required'
        ],[
            'Sector.required'        => 'Please provide a sector.',
            'Status.required'          => 'Please select a state.',
            'Group.required'          => 'Please select a group.',
            'Start.required'         => 'Please provide a starting date for the task.',
            'Start.date'             => 'Please provide a valid date',
            'End.required'            => 'Please provide an ending date for the task.',
            'End.date'                => 'Please provide a valid date',
            'End.after:Start'         => 'Please select a date after the start date',
            'Type.required'           => 'Please select a provide a type.',
            'Description.required' => 'Please provide a description',
        ]);

        $id->update($request->toArray());

        return redirect('searches/'.$id->search_id.'#nav-tasks')
        ->with('success', __('main.task').' '.'updated');

    }

    public function destroy(Task $id)
    {
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin') {
    		$id->delete();
            return redirect('searches/'.$id->search_id.'#nav-tasks')
            ->with('success', __('main.task').' '.$id->id.__('messages.deleted'));
        } else {
           return redirect('searches/'.$id->search_id.'#nav-tasks')
            ->with('error', __('messages.not_allowed'));
        }
    }
}
