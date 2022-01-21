<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    public $timestamps = false;
    protected $table='detalle_pedidos';
    protected $fillable=['idPedido','idRepuesto','precioUnitario','cantidad','precioTotal'];

    public function pedidos()
    {
        return $this->belongsTo(Pedido::class,'idPedido');
    }
    public function repuestos()
    {
        return $this->belongsTo(Repuesto::class,'idRepuesto');
    }
}
