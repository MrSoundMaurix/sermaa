<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  TipoPagoMercadoRequest extends FormRequest
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
            'descripcion' => 'required|max:50',
          /*   'estadia' => 'required|max:50', */
            'valor_pago' => 'required|numeric|min:0.00|max:999999.99'
        ];
    }

    public function messages()
    {
        return [

            'descripcion.required' => 'Es necesario ingresar la descripcion.',
         /*    'estadia.required' => 'Es necesario ingresar la estadía.', */
            'descripcion.max' => 'La descripcion no puede ser mayor a :max caracteres.',
            'valor_pago.required' => 'Es necesario ingresar el valor de pago.',
            'valor_pago.numeric' => 'La valor del pago debe ser un número.',
            'valor_pago.max' => 'La valor del pago debe ser menor a 999999.99',
            'valor_pago.min' => ' El valor pago debe ser de al menos 0.00',
        ];
    }
}
