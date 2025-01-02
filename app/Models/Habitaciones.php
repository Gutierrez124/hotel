<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitaciones extends Model
{
    use HasFactory;

    function tipohabitacion(){
        return $this->belongsTo(Tipohabitacion::class,'tipo_habitacion_id');
    }
}
