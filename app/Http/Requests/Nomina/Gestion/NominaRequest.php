<?php

namespace App\Http\Requests\Nomina\Gestion;

use Illuminate\Foundation\Http\FormRequest;

class NominaRequest extends FormRequest
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
            'idCliente'           =>'required',
            'fileDesprendible'    =>'required|mimes:pdf|max:3000"',
            'fecha_Desprendible'  =>'required',
            'valor'               =>'required|numeric'
        ];
    }
    
    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'numeric'   => 'El campo :attribute debe ser numérico',
            'mimes'     => 'Debe cargar en el campo :attribute un archivo pdf'
        ];
    }

    public function attributes()
    {
        return [
            'idCliente'             =>'Cliente',
            'fileDesprendible'      =>'Desprendible',
            'fecha_Desprendible'    =>'Fecha Desprendible',
            'valor'                 =>'Valor'
        ];
    }
}
