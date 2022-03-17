<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TipoColaboracion extends Model
{
    use HasFactory;
    protected $table = "tipo_colaboracion";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'tipo',
    ];
}
