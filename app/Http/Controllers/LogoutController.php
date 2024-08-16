<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Maneja el cierre de sesión del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Elimina todos los datos de la sesión
        Session::flush();

        // Cierra la sesión del usuario autenticado
        Auth::logout();

        // Redirige al usuario a la página de inicio de sesión
        return redirect()->to('/login');
    }
}
