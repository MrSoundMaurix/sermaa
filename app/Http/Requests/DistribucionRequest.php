<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistribucionRequest extends FormRequest
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
            'canton' => 'required',
            'parroquia' => 'required',
            'canton_destino' => 'required',
            'parroquia_destino' => 'required',
            'placa_transporte' => 'required',
            'lugar_destino' => 'required|max:200',
            'nombre_destinatario' => 'required|max:300'

        ];
    }

    public function messages()
    {
        return [

            'canton.required' => 'Es necesario seleccionar  el cantón',
            'parroquia.required' => 'Es necesario seleccionar  la parroquia',
            'canton_destino.required' => 'Es necesario seleccionar  el cantón de destino',
            'parroquia_destino.required' => 'Es necesario seleccionar  la parroquia de destino',
            'placa_transporte.required' => 'Es necesario ingresar la placa del transporte',
            'lugar_destino.required' => 'Es necesario ingresar el lugar de destino',
            'lugar_destino.max' => 'El lugar de destino no puede ser mayor a :max caracteres.',
            'nombre_destinatario.required' => 'Es necesario ingresar el nombre del destinatario',
            'nombre_destinatario.max' => 'El nombre del destinatario no puede ser mayor a :max caracteres.'
        ];
    }
}
