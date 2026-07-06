<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $cliente = $this->route('cliente');

        return [
            'nombre_completo' => 'required',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'telefono' => 'required',
            'pais' => 'required',
        ];
    }

    /**
     * Mensajes personalizados.
     */
    public function messages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre completo es obligatorio.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Debe ingresar un correo válido.',
            'correo.unique' => 'Este correo ya está registrado.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'pais.required' => 'El país es obligatorio.',
        ];
    }
}
