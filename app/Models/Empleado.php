<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected  $fillable = [
        'rfc',
        'nombre',
        'est_mun',
        'puesto',
        'horas',
        'porc_puesto',
        'periodo_pago',
        'tipo_pago',
        'num_cheque',
        'digito_verificador',
        'num_cuenta',
        'total_percep',
        'total_ded',
        'neto'
    ];
}
