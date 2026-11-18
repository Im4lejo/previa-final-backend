<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            // 1. 'sometimes' permite actualizar solo un campo (ej. solo el nombre) sin enviar los demás
            'nombre'       => ['sometimes', 'required', 'string', 'max:50'],
            'apellido'       => ['sometimes', 'required', 'string', 'max:50'],

            // 2. 'ignore($this->student)' evita el error de "cédula duplicada" con el mismo usuario
          /*  'cedula'     => [
                'sometimes',
                'required',
                'string',
                'max:20',
                Rule::unique('students', 'cedula')->ignore($this->student),
            ],*/

            'fecha_nacimiento' => ['sometimes', 'required', 'date', 'before:today'],

            // Los campos que ya eran opcionales siguen igual
            'expediente' => ['nullable', 'string', 'max:16000'],
        ];
    }
}