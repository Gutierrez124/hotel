<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    function cliente(){
        return $this->belongsTo(Clientes::class,'cliente_id');
    }

    function producto(){
        return $this->belongsTo(Productos::class,'producto_id');
    }

}
