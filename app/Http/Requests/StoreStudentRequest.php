<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'       => ['required', 'string', 'max:50'],
            'apellido'       => ['required', 'string', 'max:50'],
//            'cedula'     => ['required', 'string', 'max:20', 'unique:students,cedula'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'expediente' => ['sometimes' , "string", "max:16000"]
        ];

    }
    public function messages(): array
    {
        return [
//            'cedula.unique'     => 'Esta cédula ya se encuentra registrada.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
        ];
    }
}
