<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Solo permite acceso si el level es 0
            if ($user->level === 0) {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'No tienes permiso para ingresar.']);
            }
        }

        return redirect()->route('login')->withErrors(['error' => 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
