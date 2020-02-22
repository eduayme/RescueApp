<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use App\User;
use Auth;
use File;
use Image;
use Validator;
use Gate;

class ActivityController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get user
        $user = Auth::user();
        if (Gate::allows('admin-only', auth()->user())) {
            $activities = Activity::orderBy('id', 'desc')->paginate(10);
            //return $activities;
            return view('activities.index', compact('activities'));
        }
     return back()->with('error', __('messages.not_allowed'));

    }

    public function deleteAll()
    {
        // get user
        $user = Auth::user();
        if (Gate::allows('admin-only', auth()->user())) {
            Activity::query()->delete();
            $activities = Activity::orderBy('id', 'desc')->paginate(10);
            $error = __('messages.deleted');
            //return $activities;
            return back()->with('error', __('main.activity_log') .  __('messages.deleted'));
        }
     return back()->with('error', __('messages.not_allowed'));

    }
}
