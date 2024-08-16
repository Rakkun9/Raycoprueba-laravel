<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
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
        // Muestra la vista del formulario de registro
        return view('auth.register');
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        // Crea un nuevo usuario con los datos validados del formulario
        $user = User::create($request->validated());

        // Redirige a la página de inicio de sesión con un mensaje de éxito
        return redirect('/login')->with('success', 'Usuario creado');
    }
}
