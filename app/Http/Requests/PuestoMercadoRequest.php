<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuestoMercadoRequest extends FormRequest
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
            'nro_puesto' => 'required|max:20',
            'id_users' => 'exists:users,id',
            'id_sector_mercado' => 'exists:sector_mercado,id',
            'estado_puesto' => 'string|max:1'
        ];
    }

    public function messages()
    {
        return [
            //  'nro_puesto.max' => 'Nro Puesto no puede ser mayor a :max caracteres.',
            // 'nro_puesto.required' => 'Es necesario ingresar Nro Puesto.',

        ];
    }
}
