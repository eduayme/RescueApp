<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    public function update_user(Request $request)
    {
        // get user
        $user = Auth::user();

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

        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'profile' => 'required',
        ]);

        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->profile = $request->profile;

        $user->save();

        return view('auth.profile', ['user' => Auth::user()]);
    }
}
