<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glosa extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected  $fillable = [
        'id_nomina',
        'anio',
        'quincena',
        'nombre',
        'estatus',
        'ubicacion_fisica',
        'fecha_elaboracion',
        'fecha_entrega_srh',
        'fecha_devolucion_srh',
        'fecha_entrega_da',
        'fecha_devolucion_da',
        'fecha_digitalizacion',
        'fecha_entrega_archivo',
        'fecha_entrega_resp',
        'observaciones'
    ];



    public function nomina()
    {
        return $this->belongsTo(Nomina::class,'id_nomina');
    }

    



}
