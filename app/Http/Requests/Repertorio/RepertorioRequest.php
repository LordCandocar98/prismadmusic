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
            'version'               =>'',
            'genero'                =>'required',
            'subgenero'             =>'required',
            'nombre_sello'          =>'required',
            'formato'               =>'required',
            'fecha_lanzamiento'     =>'required|date|after:5 days',
            'productor'             =>'required|min:1|max:255',
            'annio_produccion'      =>'required|digits:4|integer|between:1900,' . date("Y"),
            'cover'                 =>'required'
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'min'       => 'El campo :attribute debe tener como mínimo :min carácteres',
            'max'       => 'El campo :attribute puede tener como máximo :max carácteres',
            'numeric'   => 'El campo :attribute debe ser numérico',
            'after'     => 'La fecha de lanzamiento debe ser después de los próximos 5 días a partir de hoy',
            'mimes'     => 'La :attribute debe ser de tipo jpg o png',
            'portada.max'   => 'La :attribute debe ser máximo de 35 MB'
        ];
    }

    public function attributes()
    {
        return [
            'titulo'            =>'Título',
            'version'           =>'Versión',
            'genero'            =>'Género',
            'subgenero'         =>'Sub-género',
            'nombre_sello'      =>'Nombre del Sello',
            'formato'           =>'Formato',
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
