<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateTeacherRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'       => ['sometimes', 'required', 'string', 'max:50'],
            'apellido'       => ['sometimes', 'required', 'string', 'max:50'],
            'telefono'       => ['sometimes', 'required', 'string', 'max:20'],
            // 2. 'ignore($this->student)' evita el error de "cédula duplicada" con el mismo usuario
              'cedula'     => [
                'sometimes',
                'required',
                'string',
                'max:20',
                Rule::unique('teachers', 'cedula')->ignore($this->teacher),
            ],

        ];

    }
}
