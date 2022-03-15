<?php

namespace App\Http\Requests\Repertorio;
use Carbon\Carbon;
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
            //$date = date('Y-m-d H:i:s'),
            //$date = strtotime($date."+ 5 days"),
            //dd(date("d-m-Y",$date)),
            'titulo'                =>'required|min:1|max:255',
            'version'               =>'',
            'artista_principal'     =>'required',
            'genero'                =>'required',
            'subgenero'             =>'required',
            'nombre_sello'          =>'required',
            'formato'               =>'required',
            'fecha_lanzamiento'     =>'required|date|after:5 days',//.Carbon::now()->subDays(5), //(date('j')+5);
            'productor'             =>'required|min:1|max:255',
            'copyright'             =>'required|min:1|max:255',
            'annio_produccion'      =>'required|digits:4|integer|min:1900|before: 2023',
            'upc_ean'               =>'',
            'numero_catalogo'       =>'',
            'portada'               =>'image|mimes:jpg,png|max:35000|dimensions:min_width=3000,min_height=3000',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El campo :attribute es requerido',
            'min'       => 'El campo :attribute debe tener como mínimo :min carácteres',
            'max'       => 'El campo :attribute puede tener como máximo :max carácteres',
            'numeric'   => 'El campo :attribute debe ser numérico',
            'after'     => 'La fecha de lanzamiento debe ser después de los próximos 5 días a partir de hoy'
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
