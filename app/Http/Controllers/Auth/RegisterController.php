<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['showRegistrationForm', 'register']);
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('login'); // Asegúrate que esta vista exista.
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @ret\Illuminate\Contracts\Validation\Validator
     */



    protected function validator(array $data)
    {
    

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'cedula.unique' => 'Este CEDULA ya existe',
            'cedula.required' => 'CEDULA es requerido',
            'cedula.max' => 'CEDULA debe tener como máximo 20 caracteres',
            'email.required' => 'Email es requerido',
            'email.email' => 'Email debe ser válido',
            'email.unique' => 'Email ya existe',
            'password.confirmed' => 'Las contraseñas deben coincidir',
            'password.min' => 'La contraseña debe tener como mínimo 8 caracteres',
            'password.required' => 'Contraseña es requerida',
        
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }



}