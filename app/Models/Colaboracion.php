<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaboracion extends Model
{
    use HasFactory;
    protected $table = "colaboracion";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'porcentaje_intelectual',
        'cliente_email',
        'cancion_id',
    ];
}
