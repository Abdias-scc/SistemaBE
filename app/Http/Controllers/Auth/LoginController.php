<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, ThrottlesLogins;
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Lógica de login
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Si las credenciales son correctas
        if (Auth::attempt($request->only('cedula', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended('/dashboard');
        }

        // Si falló, sumar intento
        $this->incrementLoginAttempts($request);

        // Si ya superó el límite
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return back()
                ->withErrors(['cedula' => 'Demasiados intentos. Inténtalo en unos minutos.'])
                ->with('lockout', true); // Clave para temporizador en el blade
        }

        // Fallo sin superar el límite
        return back()->withErrors([
            'cedula' => 'Datos incorrectos.',
        ])->withInput();
    }

    // Validación de campos
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'cedula' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    // Límite de intentos
    protected function maxAttempts()
    {
        return 3;
    }

    // Tiempo de espera en minutos
    protected function decayMinutes()
    {
        return 3;
    }

    // Nombre del campo de usuario
    public function username()
    {
        return 'cedula';
    }

    // Clave para contar intentos por IP y usuario
    protected function throttleKey()
    {
        return strtolower($this->username()) . '|' . request()->ip();
    }
}