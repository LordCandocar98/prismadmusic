<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = "persona";
    public $timestamps=false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellido',
        'pais',
        'ciudad',
        'departamento',
        'tipo_documento',
        'numero_identificacion',
        'telefono',
        'user_id',
    ];

}