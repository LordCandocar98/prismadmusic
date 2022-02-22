<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;
    protected $table = "cancion";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'repertorio_id',
        //'colaboracion_id', //Añadí esto
        'tipo_secundario',
        'instrumental',
        'titulo',
        'version_subtitulo',
        'cliente_id',
        'autor',
        'compositor',
        'arreglista',
        'productor',
        'pline',
        'annio_produccion',
        'genero',
        'subgenero',
        'genero_secundario',
        'subgenero_secundario',
        'letra_chocante_vulgar',
        'inicio_previsualizacion',
        'idioma_titulo',
        'idioma_letra',
        'fecha_principal_salida',
        'pista_mp3',
    ];
}
