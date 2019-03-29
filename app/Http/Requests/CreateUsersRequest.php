<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
            'password' => 'required',
            'usuario' => 'required',
            'email' => 'required|email|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre es obligatorio!',
            'apellido.required' => 'Apellido es obligatorio!',
            'direccion.required' => 'Direccion es obligatoria!',
            'telefono.required' => 'Telefono es obligatorio!',
            'fecha_nacimiento.required' => 'Fecha de Nac. es obligatoria!',
            'password.required' => 'Password es obligatorio!',
            'usuario.required' => 'Usuario es obligatorio!',
            'email.required' => 'Email es obligatorio!',
            'email.unique' => 'El email ya existe!',
        ];
    }
}
