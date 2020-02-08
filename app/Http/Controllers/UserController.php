<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use Validator;

class UserController extends Controller
{
    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    public function show($id)
    {
        // get user
        $user = User::find($id);

        return view('auth.view_profile', ['current_user' => Auth::user(), 'profile_user' => $user]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get user
        $user = Auth::user();

        if ($user->is_admin()) {
            $users = User::orderBy('id', 'desc')->get();

            return view('users_manage.index', compact('users'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'min:2', 'max:50'],
            'email'     => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'dni'       => ['required', 'string', 'min:8', 'max:10', 'unique:users'],
            'profile'   => ['required', 'string'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required'      => __('messages.required'),
            'name.min'           => __('messages.min'),
            'name.max'           => __('messages.max'),
            'email.required'     => __('messages.required'),
            'email.email'        => __('messages.email'),
            'email.max'          => __('messages.max'),
            'email.unique'       => __('messages.unique'),
            'dni.min'            => __('messages.min8_max10'),
            'dni.max'            => __('messages.min8_max10'),
            'dni.unique'         => __('messages.unique'),
            'password.min'       => __('messages.min8'),
            'password.confirmed' => __('messages.confirmed'),
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)
            ->with('error', __('messages.error_form'));
        }

        $user = User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'dni'       => $request->get('dni'),
            'profile'   => $request->get('profile'),
            'password'  => Hash::make($request->get('password')),
        ]);

        $user->save();
        $users = User::orderBy('id', 'desc')->get();

        return back()
        ->with('success', $user->name.__('messages.added'));
    }

    public function update(Request $request, $id)
    {
        // get user
        $user = User::find($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();

            // delete current image before uploading new image
            if ($user->avatar !== 'default.jpg') {
                $file = public_path('/uploads/avatars/'.$user->avatar);

                if (File::exists($file)) {
                    unlink($file);
                }
            }

            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));

            $user->avatar = $filename;
        }

        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'min:2', 'max:50'],
            'email'     => ['required', 'email', 'max:50'],
            'profile'   => ['required'],
        ], [
            'name.required'    => __('messages.required'),
            'name.min'         => __('messages.min'),
            'name.max'         => __('messages.max'),
            'email.required'   => __('messages.required'),
            'email.email'      => __('messages.email'),
            'email.max'        => __('messages.max'),
            'profile.required' => __('messages.required'),
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)
            ->with('error', __('messages.error_form'));
        }

        $user->name = $request->has('name') ? $request->get('name') : $user->name;
        $user->email = $request->has('email') ? $request->get('email') : $user->email;
        $user->dni = $request->has('dni') ? $request->get('dni') : $user->profile;
        $user->profile = $request->has('profile') ? $request->get('profile') : $user->profile;

        $user->save();

        return back()
        ->with('success', $user->name.__('messages.updated'));
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
        $user = User::find($id);

        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin') {
            $user->delete();

            return back()
            ->with('success', $user->name.__('messages.deleted'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }
}
