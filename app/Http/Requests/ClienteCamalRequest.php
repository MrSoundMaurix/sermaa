<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class ClienteCamalRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'codigo' => 'required|unique:users,codigo',
                    'cedula' => 'required|cedula|unique:users,cedula|max:13',
                    'nombres' => 'required|max:200|regex:/^[\pL\s\-]+$/u',
                    'apellidos' => 'required|max:200|regex:/^[\pL\s\-]+$/u',
                    'telefono' => 'required|max:13',
                    'direccion' => 'required|max:200',
                    'email' => 'required|unique:users,email|email|max:191',
                    'foto' => 'nullable|file|mimes:jpeg,png,jpg,JPG|max:256',
                ];
                break;
            case 'PATCH':
                $user = User::find($this->id);
                return [
                    'cedula' => 'required|cedula|unique:users,cedula,' . $user->id . ',id|max:13',
                    'nombres' => 'required|max:200|regex:/^[\pL\s\-]+$/u',
                    'apellidos' => 'required|max:200|regex:/^[\pL\s\-]+$/u',
                    'telefono' => 'required|max:13',
                    'direccion' => 'required|max:200',
                    'foto' => 'nullable|file|mimes:jpeg,png,jpg,JPG|max:256',
                    'estado' => 'nullable',
                ];
                break;
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'codigo.unique' => 'El código que ingreso, ya existe.',
            'email.unique' => 'El correo electrónico que ingreso, ya existe.',
            'cedula.cedula' => 'El campo Cédula es incorrecto',
            'cedula.unique' => 'La cédula que ingreso, ya existe.',
            'nombres.regex' => 'El campo Nombres debe contener letras',
            'apellidos.regex' => 'El campo Apellidos debe contener letras',
        ];
    }
}
