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
        $fecha_abajo = Carbon::now()->addMonths(-3)->format('Y-m-d');
        $fecha_informe_inicio = $_REQUEST['fecha_informe_inicio'] ? Carbon::createFromFormat('Y-m-d', $_REQUEST['fecha_informe_inicio']) : null;
        $fecha_arriba= $fecha_informe_inicio ? $fecha_informe_inicio->addMonths(3)->format('Y-m-d') : null;
        return [
            'idcancion'             =>'required',
            'fileInforme'           =>'required|mimes:doc,csv,xlsx,xls,docx,odt,ods,odp|max:3000"',
            'fecha_informe_inicio'  =>'required|date|date_format:Y-m-d|before_or_equal:' . $fecha_abajo,
            'fecha_informe_final'   =>'required|date|date_format:Y-m-d|'.($fecha_arriba ? 'after_or_equal:' : '').($fecha_arriba ? $fecha_arriba : ''),
            'valor'                 =>'required|numeric'
        ];
    }

    public function messages()
    {
        $fecha_abajo = Carbon::now()->addMonths(-3)->format('d/m/Y');
        $fecha_informe_inicio = $_REQUEST['fecha_informe_inicio'] ? Carbon::createFromFormat('Y-m-d', $_REQUEST['fecha_informe_inicio']) : null;
        $fecha_arriba = $fecha_informe_inicio ? $fecha_informe_inicio->addMonths(3)->format('d/m/Y') : null;
        return [
            'required'  => 'El campo :attribute es requerido',
            'numeric'   => 'El campo :attribute debe ser numérico',
            'mimes'     => 'Debe cargar en el campo :attribute un archivo excel',
            'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a '.$fecha_abajo,
            'after_or_equal'  => 'El campo :attribute debe ser una fecha posterior o igual a '.$fecha_arriba ? $fecha_arriba : '',
        ];
    }

    public function attributes()
    {
        return [
            'idcancion'             =>'Cancion',
            'fileInforme'           =>'Informe',
            'fecha_informe_inicio'  =>'Fecha Informe Inicio',
            'fecha_informe_final'   =>'Fecha Informe Final',
            'valor'                 =>'Valor'
        ];
    }
}
