<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'nombre_artistico',
        'link_spoty',
        'numero_cuenta_bancaria',
        'tipo_cuenta_bancaria',
        'persona_id', //Se tiene que añadir para poder crear clientes en el controlador de Persona
        'nombre_banco',
        'archivo_banco',
    ];

}
