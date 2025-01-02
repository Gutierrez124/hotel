<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    function pedidos(){
        return $this->belongsTo(Pedidos::class,'pedido_id');
    }

    function producto(){
        return $this->belongsTo(Productos::class,'producto_id');
    }
}
