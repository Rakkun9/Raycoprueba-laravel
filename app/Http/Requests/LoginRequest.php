<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'name' => 'required', // El campo 'name' es obligatorio
            'password' => 'required', // El campo 'password' es obligatorio
        ];
    }

    /**
     * Obtiene las credenciales de la solicitud.
     *
     * @return array<string, string>
     */
    public function getCredentials()
    {
        $name = $this->get('name');

        // Si el nombre es un email, retorna un array con 'email' y 'password'
        if ($this->isEmail($name)) {
            return [
                'email' => $name,
                'password' => $this->get('password')
            ];
        }

        // Si no es un email, retorna solo 'name' y 'password'
        return $this->only('name', 'password');
    }

    /**
     * Verifica si el valor proporcionado es un email.
     *
     * @param mixed $value
     * @return bool
     */
    public function isEmail($value)
    {
        $factory = $this->container->make(ValidationFactory::class);

        // Verifica si el valor cumple con la regla de validación de email
        return !$factory->make(['name' => $value], ['name' => 'email'])->fails();
    }
}
