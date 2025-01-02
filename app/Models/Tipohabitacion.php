<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipohabitacion extends Model
{
    use HasFactory;

    function tipohabitacionimg(){
        return $this->hasMany(Tiposhabitacionesimg::class,'tipo_habitacion_id');
    }
}
