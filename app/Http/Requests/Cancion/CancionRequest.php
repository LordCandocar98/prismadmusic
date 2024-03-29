<?php

namespace App\Http\Requests\Cancion;

use Illuminate\Foundation\Http\FormRequest;
class CancionRequest extends FormRequest
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
            'tipo_secundario'          =>'required',
            'instrumental'             =>'required',
            'titulo'                   =>'required|min:1|max:255',
            'version_subtitulo'        =>'max:255',
            'autor'                    =>'required|min:1|max:255',
            'compositor'               =>'required|min:1|max:255',
            'arreglista'               =>'max:255',
            'productor'                =>'max:255',
            'pline'                    =>'required|min:1|max:255',
            'annio_produccion'         =>'required|numeric',
            'letra_chocante_vulgar'    =>'required',
            'inicio_previsualizacion'  =>'nullable|numeric',
            'idioma_titulo'            =>'required',
            'idioma_letra'             =>'required',
            'fecha_principal_salida'   =>'required',
            'pista_mp3'                =>'required',
            'porcentaje_intelectualCreador' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'min'       => 'El campo :attribute debe tener como mínimo :min carácteres',
            'max'       => 'El campo :attribute puede tener como máximo :max carácteres',
            'numeric'   => 'El campo :attribute debe ser numérico',

        ];
    }

    public function attributes()
    {
        return [
            'repertorio_id'            =>'Repertorio',
            'tipo_secundario'          =>'Tipo secundario',
            'instrumental'             =>'Instrumental',
            'titulo'                   =>'Título',
            'version_subtitulo'        =>'Versión/Subtítulo',
            'featuring'                =>'Featuring',
            'remixer'                  =>'Remixer',
            'autor'                    =>'Autor',
            'compositor'               =>'Compositor',
            'arreglista'               =>'Arreglista',
            'productor'                =>'Productor',
            'pline'                    =>'Pline',
            'annio_produccion'         =>'Año de producción',
            'genero'                   =>'Género',
            'subgenero'                =>'Subgénero',
            'genero_secundario'        =>'Género secundario',
            'subgenero_secundario'     =>'Sub-género secundario',
            'letra_chocante_vulgar'    =>'Letra chocante o vulgar',
            'inicio_previsualizacion'  =>'Inicio previsualización',
            'idioma_titulo'            =>'Idioma título',
            'idioma_letra'             =>'Idioma letra',
            'fecha_principal_salida'   =>'Fecha principal de salida',
            'acepta_riesgo'            =>'Acepto responsabilidad de creación de la canción',
            'pista_mp3'                =>'Pista canción',
            'porcentaje_intelectualCreador' =>'Porcentaje intelectual propio (tuyo)',
        ];
    }

}
