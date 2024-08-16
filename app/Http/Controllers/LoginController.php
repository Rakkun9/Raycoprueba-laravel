<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     * Si el usuario ya está autenticado, redirige a la página de tareas.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show()
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Redirige a la página de tareas si el usuario está autenticado
            return redirect('/tareas');
        }
        // Muestra la vista del formulario de inicio de sesión
        return view('auth.login');
    }

    /**
     * Maneja el inicio de sesión del usuario.
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        // Obtiene las credenciales de la solicitud
        $credentials = $request->getCredentials();

        // Verifica si las credenciales no son válidas
        if (!Auth::validate($credentials)) {
            // Redirige a la página de inicio de sesión con un mensaje de error
            return redirect()->to('/login')->withErrors('Auth.failed');
        }

        // Recupera el usuario por sus credenciales
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // Inicia sesión con el usuario recuperado
        Auth::login($user);

        // Llama al método authenticated para manejar la redirección después del inicio de sesión
        return $this->authenticated($request, $user);
    }

    /**
     * Redirige al usuario autenticado a la página de tareas.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated(Request $request, $user)
    {
        // Redirige a la página de tareas
        return redirect('/tareas');
    }
}
