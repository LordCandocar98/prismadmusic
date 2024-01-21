<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboracionArtFea extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'nombre',
        'tipo_colaboracion',
        'cancion_id',
        'link_spoty'
    ];
}

