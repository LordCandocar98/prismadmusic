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
}
