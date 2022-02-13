<?php

namespace App\Http\Requests\Repertorio;

use Illuminate\Foundation\Http\FormRequest;

class CompartirMusicaRequest extends FormRequest
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
            'nombre_artista'    => 'required',
            'link_spotify'      => 'required|min:5|max:255',
            'num_celular'       => 'required|numeric|digits:10',
            'email'             => 'required|email',
            'descripcion'       => 'max:280',
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
            'nombre_artista'    => 'Nombre artístico',
            'link_spotify'      => 'Link spotify',
            'num_celular'       => 'Número de celular',
            'email'             => 'Correo electrónico',
        ];
    }
}
