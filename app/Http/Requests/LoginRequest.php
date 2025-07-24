<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para el formulario de login.
     */
    public function rules(): array
    {
        return [
            "username" => ["required", "exists:users,username"],
            "password" => ["required", "string"]
        ];
    }

    /**
     * Mensajes personalizados para errores de validación.
     */
    public function messages(): array
    {
        return [
            'username.required' => 'El campo nombre de usuario es obligatorio.',
            'username.exists' => 'El nombre de usuario no está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
        ];

    }
}
