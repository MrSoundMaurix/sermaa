<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PdfRequest extends FormRequest
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
            'guia_pdf' => 'required|mimes:pdf|max:2048'
        ];
    }

    public function messages()
    {
        return [

            'guia_pdf.required' => 'Es necesario adjuntar el documento en pdf',
            'guia_pdf.max' => 'El documento de pdf no debe superar el tamaño de 2048 kilobytes (2MB)',
            'guia_pdf.mimes' => 'Sólo se permite adjuntar archivos en formato pdf'
        ];
    }
}
