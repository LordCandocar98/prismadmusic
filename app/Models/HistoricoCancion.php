<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoCancion extends Model
{
    use HasFactory;
    protected $table = "historico_canciones";
    public $timestamps = false;
    protected $primaryKey = 'id'; // or null

    protected $fillable = [
        'id',
        'cancion_id',
        'annio',
        'mes',
        'valor',
    ];
        /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getValorFalsoAttribute($value)
    {
        return 'USD ' . $this->valor;
    }
}
