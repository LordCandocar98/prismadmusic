<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;
    protected $table = "nomina";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null
    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getFakeValorAttribute($value)
    {
        return 'USD ' . $this->valor;
    }



}
