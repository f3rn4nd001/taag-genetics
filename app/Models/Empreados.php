<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empreados extends Model
{
    use HasFactory;
    protected $table = "catprobedor";

    protected $fillable = [
        'tNombre',
        'eCodEmpresa',
       
    ];
}
