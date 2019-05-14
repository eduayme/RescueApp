<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'min:2', 'max:50'],
            'email'    => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'dni'      => ['required', 'string', 'min:8', 'max:10', 'unique:users'],
            'perfil'   => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required'      => __('messages.required'),
            'name.min'           => __('messages.min'),
            'name.max'           => __('messages.max'),
            'email.required'     => __('messages.required'),
            'email.email'        => __('messages.email'),
            'email.max'          => __('messages.max'),
            'email.unique'       => __('messages.unique'),
            'dni.min'            => __('messages.min'),
            'dni.max'            => __('messages.max'),
            'dni.unique'         => __('messages.unique'),
            'password.min'       => __('messages.min'),
            'password.confirmed' => __('messages.confirmed'),
        ]);

        $input = request()->except('password', 'confirm_password');
        $user = new User($input);
        $user->password = bcrypt(request()->password);
        $user->save();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        session()->flash('success', __('main.welcome').' '.$data['name']);

        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'dni'      => $data['dni'],
            'perfil'   => $data['perfil'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
