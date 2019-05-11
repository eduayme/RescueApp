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
            'name.required'      => __('messages.name_required'),
            'name.min'           => __('messages.name_min'),
            'name.max'           => __('messages.name_max'),
            'email.required'     => __('messages.email_required'),
            'email.email'        => __('messages.email_email'),
            'email.max'          => __('messages.email_max'),
            'email.unique'       => __('messages.email_unique'),
            'dni.min'            => __('messages.dni_min'),
            'dni.max'            => __('messages.dni_max'),
            'dni.unique'         => __('messages.dni_unique'),
            'password.min'       => __('messages.password_min'),
            'password.confirmed' => __('messages.password_confirmed'),
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
