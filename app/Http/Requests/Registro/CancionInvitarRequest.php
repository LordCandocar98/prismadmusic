<?php

namespace App\Http\Requests\Registro;

use Illuminate\Foundation\Http\FormRequest;
class CancionInvitarRequest extends FormRequest
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
            'instrumental'             =>'',
            'titulo'                   =>'required|min:1|max:255',
            'version_subtitulo'        =>'max:255',
            'cliente_id'               =>'required',
            'featuring'                =>'min:1|max:255',
            'remixer'                  =>'min:1|max:255',
            'autor'                    =>'required|min:1|max:255',
            'compositor'               =>'required|min:1|max:255',
            'arreglista'               =>'max:255',
            'productor'                =>'max:255',
            'pline'                    =>'required|min:1|max:255',
            'annio_produccion'         =>'required|numeric',
            'genero'                   =>'required',
            'subgenero'                =>'required',
            'genero_secundario'        =>'',
            'subgenero_secundario'     =>'',
            'letra_chocante_vulgar'    =>'required',
            'inicio_previsualizacion'  =>'numeric',
            'idioma_titulo'            =>'required',
            'idioma_letra'             =>'required',
            'fecha_principal_salida'   =>'required',
            'acepta_riesgo'            =>'required',
            'porcentaje_artistaPr'     =>'required|numeric',
            'porcentaje_featuring'     =>'numeric',
            'porcentaje_remix'         =>'numeric',
            'nombre_colaboracion'      =>'',
            'repertorio_id'            =>'required',

            'nombre_artistico'         =>'required|min:1|max:255',

            'name'                     => ['required', 'string', 'max:255'],
            'email'                    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'                 => '',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'min'       => 'El campo :attribute debe tener como mínimo :min carácteres',
            'max'       => 'El campo :attribute puede tener como máximo :max carácteres',
            'numeric'   => 'El campo :attribute debe ser numérico',
            'email'     => 'Parece que no es un nombre de :attribute valido .',
            'unique'    => 'El :attribute no es unico.',
            'confirmed' => ':attribute debe ser confirmado.'
        ];
    }

    public function attributes()
    {
        return [
            'tipo_secundario'          =>'Tipo secundario',
            'instrumental'             =>'Instrumental',
            'titulo'                   =>'Título',
            'version_subtitulo'        =>'Versión/Subtítulo',
            'cliente_id'               =>'Artista principal',
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

            'nombre_artistico'         =>'Nombre artístico colaborador',

            'name'                     => 'Nombre de usuario',
            'email'                    => 'Correo eletronico',
            'password'                 => 'Contraseña'
        ];
    }

}
