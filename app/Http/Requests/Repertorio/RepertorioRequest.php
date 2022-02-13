<?php

namespace App\Http\Requests\Repertorio;

use Illuminate\Foundation\Http\FormRequest;
class RepertorioRequest extends FormRequest
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
            'titulo'                =>'required|min:1|max:255',
            'version'               =>'min:3|max:255',
            'artista_principal'     =>'required',
            'genero'                =>'required',
            'subgenero'             =>'required',
            'nombre_sello'          =>'required',
            'formato'               =>'required',
            'fecha_salida'          =>'required|min:1|max:255',
            'fecha_lanzamiento'     =>'required|after:tomorrow',
            'productor'             =>'required|min:1|max:255',
            'copyright'             =>'required|min:1|max:255',
            'annio_produccion'      =>'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'upc_ean'               =>'min:1|max:255',
            'numero_catalogo'       =>'numeric',
            'portada'               =>'image|mimes:jpg,png|max:35000|dimensions:max_width=3000,max_height=3000',
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
            'titulo'            =>'Título',
            'version'           =>'Versión',
            'artista_principal' =>'Artista principal',
            'genero'            =>'Género',
            'subgenero'         =>'Sub-género',
            'nombre_sello'      =>'Nombre del Sello',
            'formato'           =>'Formato',
            'fecha_salida'      =>'Fecha de salida',
            'fecha_lanzamiento' =>'Fecha de lanzamiento',
            'productor'         =>'Productor',
            'copyright'         =>'Copyright',
            'annio_produccion'  =>'Año de producción',
            'upc_ean'           =>'UPC/EAN',
            'numero_catalogo'   =>'Número de catálogo',
            'portada'           =>'Imagen de portada',
        ];
    }

}
