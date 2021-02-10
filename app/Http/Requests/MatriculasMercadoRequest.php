<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculasMercadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
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
            'id_tipo_pago' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'id_tipo_pago.required' => 'Es necesario seleccionar  el tipo de pago.'
        ];
    }

}