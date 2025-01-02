<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    function cliente(){
        return $this->belongsTo(Clientes::class);
    }

    function habitacion(){
        return $this->belongsTo(Habitaciones::class);
    }
}
