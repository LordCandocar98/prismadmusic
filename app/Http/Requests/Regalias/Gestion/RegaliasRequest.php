<?php

namespace App\Http\Requests\Regalias\Gestion;

use Carbon\Carbon;
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
            'idcancion'             =>'required',
            // 'fileInforme'           =>'required|file|mimes:doc,csv,xlsx,xls,docx,odt,ods,odp|max:3000',
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
            'mimes'     => 'Debe cargar en el campo :attribute un archivo excel',
            'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a ',
            'after_or_equal'  => 'El campo :attribute debe ser una fecha posterior o igual a ',
        ];
    }

    public function attributes()
    {
        return [
            'idcancion'             =>'Cancion',
            // 'fileInforme'           =>'Informe',
            'fecha_informe_inicio'  =>'Fecha Informe Inicio',
            'fecha_informe_final'   =>'Fecha Informe Final',
            'valor'                 =>'Valor'
        ];
    }
}
