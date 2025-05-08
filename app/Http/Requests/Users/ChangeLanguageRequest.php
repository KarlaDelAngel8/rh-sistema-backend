<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ChangeLanguageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'language_id' => 'required|in:1,2,3',
        ];
    }

    public function messages(): array
    {
        return [
            'language_id.required' => 'El idioma es obligatorio.',
            'language_id.in' => 'El idioma seleccionado no es válido.',
        ];
    }
}
