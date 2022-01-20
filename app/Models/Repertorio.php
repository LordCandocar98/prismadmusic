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
}
