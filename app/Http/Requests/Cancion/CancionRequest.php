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
            'tipo_secundario'          =>'required|min:1|max:255',
            'instrumental'             =>'required|min:3|max:255',
            'titulo'                   =>'required',
            'version_subtitulo'        =>'required',
            'featuring'                =>'required',
            'remixer'                  =>'required',
            'autor'                    =>'required|min:1|max:255',
            'compositor'               =>'required|min:1|max:255',
            'arreglista'               =>'required|min:1|max:255',
            'productor'                =>'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'pline'                    =>'required|min:1|max:255',
            'annio_produccion'         =>'required|numeric',
            'genero'                   =>'required|image|mimes:jpg,png,jpeg|max:35000|dimensions:max_width=3000,max_height=3000',
            'subgenero'                =>'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'genero_secundario'        =>'required|min:1|max:255',
            'subgenero_secundario'     =>'required|numeric',
            'letra_chocante_vulgar'    =>'required|image|mimes:jpg,png,jpeg|max:35000|dimensions:max_width=3000,max_height=3000',
            'inicio_previsualizacion'  =>'required|numeric',
            'idioma_titulo'            =>'required|image|mimes:jpg,png,jpeg|max:35000|dimensions:max_width=3000,max_height=3000',
            'idioma_letra'             =>'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'fecha_principal_salida'   =>'required|min:1|max:255',
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
            'tipo_secundario'            =>'Título',
            'instrumental'           =>'Versión',
            'titulo' =>'Artista principal',
            'version_subtitulo'            =>'Género',
            'featuring'         =>'Sub-género',
            'remixer'      =>'Nombre del Sello',
            'autor'           =>'Formato',
            'compositor'      =>'Fecha de salida',
            'arreglista'         =>'Productor',
            'productor'         =>'Copyright',
            'pline'  =>'Año de producción',
            'annio_produccion'           =>'UPC/EAN',
            'genero'   =>'Número de catálogo',
            'subgenero'           =>'Imagen de portada',
            'genero_secundario'      =>'Fecha de salida',
            'subgenero_secundario'         =>'Productor',
            'letra_chocante_vulgar'         =>'Copyright',
            'inicio_previsualizacion'  =>'Año de producción',
            'idioma_titulo'           =>'UPC/EAN',
            'idioma_letra'   =>'Número de catálogo',
            'fecha_principal_salida'           =>'Imagen de portada',
        ];
    }

}
