<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use File;

class UserController extends Controller
{
    public function profile() {
        return view('auth.profile', array('user' => Auth::user() ));
    }

    public function update_avatar(Request $request) {
        // Get user
        $user = Auth::user();

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            // Delete current image before uploading new image
            if ($user->avatar !== 'default_avatar.jpg') {
                $file = public_path('uploads/avatars/' . $user->avatar);

                if (File::exists($file)) {
                    unlink($file);
                }
            }

            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

            $user->avatar = $filename;
            $user->save();
        }
        return view( 'auth.profile', array( 'user' => Auth::user() ));
    }

    public function update_user(Request $request)
    {
        // Get user
        $user = Auth::user();

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            // Delete current image before uploading new image
            if ($user->avatar !== 'default_avatar.jpg') {
                $file = public_path('uploads/avatars/' . $user->avatar);

                if (File::exists($file)) {
                    unlink($file);
                }
            }

            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

            $user->avatar = $filename;
            $user->save();
        }

        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'perfil' => 'required',
        ]);

        $user->name   = $request->name;
        $user->email  = $request->email;
        $user->perfil = $request->perfil;

        $user->save();
        return view( 'auth.profile', array( 'user' => Auth::user() ));
    }
}
