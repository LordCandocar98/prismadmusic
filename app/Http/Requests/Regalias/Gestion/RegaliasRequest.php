<?php

namespace App\Http\Requests\Regalias\Gestion;

use Illuminate\Foundation\Http\FormRequest;

class RegaliasRequest extends FormRequest
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
            'idCliente'             =>'required',
            'fileInforme'           =>'required|mimes:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp|max:3000"',
            'fecha_informe_inicio'  =>'required',
            'fecha_informe_final'   =>'required',
            'valor'                 =>'required|numeric'
        ];
    }
    
    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'numeric'   => 'El campo :attribute debe ser numérico',
            'mimes'     => 'Debe cargar en el campo :attribute un archivo excel'
        ];
    }

    public function attributes()
    {
        return [
            'idCliente'             =>'Cliente',
            'fileInforme'           =>'Informe',
            'fecha_informe_inicio'  =>'Fecha Informe Inicio',
            'fecha_informe_final'   =>'Fecha Informe Final',
            'valor'                 =>'Valor'
        ];
    }
}
