<?php

namespace App\Http\Controllers;

use App\Activity;
use Gate;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        /* Allow user to access activity logs of users if user is admin */
        if (Gate::allows('admin-only', auth()->user())) {
            $activities = Activity::orderBy('id', 'desc')->get();

            return view('activities.index', compact('activities'));
        }

        return back()->with('error', __('messages.not_allowed'));
    }

    /**
     * Deleting all the records in activity log.
     *
     * @return void
     */
    public function deleteAll()
    {
        /* Allow user to delete all activity logs of users if user is admin */
        if (Gate::allows('admin-only', auth()->user())) {
            Activity::query()->delete();

            return back()->with('error', __('main.logs').__('messages.deleted'));
        }

        return back()->with('error', __('messages.not_allowed'));
    }
}
