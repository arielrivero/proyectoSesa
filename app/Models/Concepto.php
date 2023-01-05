<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{


    public $timestamps = false;
    use HasFactory;
    protected  $fillable = [
        'id_empleado',
        'concepto',
        'importe'
    ];
}
