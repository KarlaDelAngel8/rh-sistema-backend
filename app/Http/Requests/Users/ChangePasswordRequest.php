<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "current_password" => "required",
            "new_password" => "required|string|min:8",


        ];
    }
    public function messages(): array
    {
        return[

            "password.confirmed" => "El password confirmado no coincide.",
            "current_password.required" => "La contraseña anterior es requerido.",
            "new_password.required"=> "Ingresa una nueva contraseña es requerida. ",
            "new_password.string"=>"La nueva contraseña debe ser alfanumerica.",
            "new_password.min"=>"La nueva contraseña debe de tener al menos 8 caracteres.",

        ];

    }
}
