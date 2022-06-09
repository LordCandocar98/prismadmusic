<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subgenero extends Model
{
    use HasFactory;
    protected $table = "subgenero";
    public $timestamps=false;
    protected $primaryKey = 'id'; // or null
}