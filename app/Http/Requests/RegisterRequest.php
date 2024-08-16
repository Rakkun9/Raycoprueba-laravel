<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email', // El campo 'email' es obligatorio y debe ser único en la tabla 'users'
            'name' => 'required|unique:users,name', // El campo 'name' es obligatorio y debe ser único en la tabla 'users'
            'password' => 'required|min:6', // El campo 'password' es obligatorio y debe tener al menos 6 caracteres
            'password_confirmation' => 'required|same:password', // El campo 'password_confirmation' es obligatorio y debe coincidir con 'password'
        ];
    }
}
