<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repertorio extends Model
{
    use HasFactory;
    protected $table = "repertorio";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'titulo',
        'version',
        'genero',
        'subgenero',
        'nombre_sello',
        'formato',
        'fecha_lanzamiento',
        'productor',
        'copyright',
        'annio_produccion',
        'upc_ean',
        'numero_catalogo',
        'portada',
        'terminado'
    ];

    public function count_song(){
        return Cancion::where('repertorio_id', '=', $this->id)
        ->get()
        ->count();
    }
}
