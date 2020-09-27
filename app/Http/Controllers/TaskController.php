<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function create($search_id)
    {
        if (\Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.tasks.create', [
                    'search_id' => $search_id,
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
            'sector'          => 'required',
            'status'          => 'required', Rule::in(['to_do', 'in_progress', 'done']),
            'gpxFile'         => 'file|mimes:bin,dms,lrf,mar,gpx,xml',
        ], [
            'sector.required' => __('messages.required'),
            'status.required' => __('messages.required'),
            'gpxFile.mimes'   => __('messages.gpx_file'),
        ]);

        $task = new Task([
            'search_id'             => $request->get('search_id'),
            'sector'                => $request->get('sector'),
            'status'                => $request->get('status'),
            'group'                 => $request->get('group'),
            'start'                 => $request->get('start'),
            'end'                   => $request->get('end'),
            'type'                  => $request->get('type'),
            'description'           => $request->get('description'),
            'trackingDevice'        => $request->get('trackingDevice'),
            'gpxFileName'           => $request->get('gpxFileName'),
            'gpxFile'               => $request['gpxFile'],
        ]);

        if ($request->hasFile('gpxFile')) {
            $task->gpx = 1;
        }

        $task->save();

        return redirect('searches/'.$task->search_id.'#nav-tasks')
        ->with('success', __('main.task').' '.$task->id.__('messages.added'));
    }

    public function update(Request $request, Task $id)
    {
        $request->validate([
            'sector'          => 'required',
            'status'          => 'required', Rule::in(['to_do', 'in_progress', 'done']),
            'gpxFile'         => 'file|mimes:bin,dms,lrf,mar,gpx,xml',
        ], [
            'sector.required' => __('messages.required'),
            'status.required' => __('messages.required'),
            'gpxFile.mimes'   => __('messages.gpx_file'),
        ]);

        $id->update($request->toArray());

        if ($request->hasFile('GpxFile')) {
            $id->update([
                'GpxFileName'   => $request->get('gpxFileName'),
                'Gpx'           => 1,
                'GpxFile'       => $request['gpxFile'],
            ]);
        }

        return redirect('searches/'.$id->search_id.'#nav-tasks')
        ->with('success', __('main.task').' '.$id->id.__('messages.updated'));
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
