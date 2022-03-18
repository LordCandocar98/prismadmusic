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
            'idCliente'     => 'required',
            'tipo_cuenta'   => 'required',
            'nombre_banco'  => 'required',
            'numero_cuenta' => 'required',
            'valor'         => 'required|numeric|min:200'
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'numeric'   => 'El campo :attribute debe ser numérico',
            'mimes'     => 'Debe cargar en el campo :attribute un archivo pdf',
            'valor.min'     => 'El campo :attribute debe ser mínimo :min dolares'
        ];
    }

    public function attributes()
    {
        return [
            'idCliente'             => 'Cliente',
            'fileDesprendible'      => 'Desprendible',
            'fecha_Desprendible'    => 'Fecha Desprendible',
            'valor'                 => 'Valor'
        ];
    }
}
