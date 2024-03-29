<?php

namespace App\Http\Requests\Registro;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    public $validator;
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
            'nombre'                => 'required|min:3|max:35',
            'apellido'              => 'required|min:3|max:35',
            'pais'                  => 'required',
            'departamento'          => 'required',
            'tipo_documento'        => 'required|min:2|max:3',
            'numero_identificacion' => 'required|min:3|max:20',
            'telefono'              => 'required|numeric',
            'nombre_artistico'      => 'required|min:3|max:20',
            'link_spoty'            => 'max:255',
            'acepta_TermsPrivCond'  => 'required',
            'acepta_Contrato'       => 'required',
            'firma'                 => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'min'       => 'El campo :attribute debe tener como mínimo :min carácteres',
            'max'       => 'El campo :attribute puede tener como máximo :max carácteres',
            'numeric'   => 'El campo :attribute debe ser numérico'
        ];
    }

    public function attributes()
    {
        return [
            'nombre'                => 'Nombre',
            'apellido'              => 'Apellido',
            'pais'                  => 'País',
            'departamento'          => 'Departamento',
            'tipo_documento'        => 'Tipo de documento',
            'numero_identificacion' => 'Número de documento',
            'telefono'              => 'Teléfono',
            'nombre_artistico'      => 'Nombre artístico',
            'link_spoty'            => 'Link Spotify',
            'acepta_TermsPrivCond'  => 'Políticas de Privacidad y Términos/Condiciones',
            'acepta_Contrato'       => 'Contrato web Prismad Music',
            'firma'                 => 'Firma en el Acuerdo exclusivo de administración de derechos fonográficos'
        ];
    }
}
