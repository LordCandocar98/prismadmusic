<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalia extends Model
{
    use HasFactory;
    protected $table = "regalia";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'cliente_id',
        'informe',
        'fecha_informe_inicio',
        'fecha_informe_final',
        'nomina_id',
        'valor',


    ];
}
