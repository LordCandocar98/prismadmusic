<?php

namespace App\Http\Requests\Regalias\Varios;

use Illuminate\Foundation\Http\FormRequest;

class RegaliasVariasRequest extends FormRequest
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
            'idcliente2' => 'required',
            'valor2' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'numeric' => 'El campo :attribute debe ser numérico',
        ];
    }

    public function attributes()
    {
        return [
            'idcliente2' => 'Cliente',
            'valor2' => 'Valor'
        ];
    }
}
