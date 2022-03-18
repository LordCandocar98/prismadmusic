<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboracionRepertorio extends Model
{
    use HasFactory;
    protected $table = "colaboracion_repertorio";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'repertorio_id',
        'cliente_email',
        'tipo_colaboracion',
        'spotify_colaboracion',
    ];
}
