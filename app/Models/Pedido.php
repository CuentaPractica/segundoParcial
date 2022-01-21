<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table='pedidos';
    protected $fillable=['idProveedor','montoTotal'];

    public function proveedores()
    {
        return $this->belongsTo(Persona::class,'idProveedor');
    }
    public function detallesPedidos()
    {
        return $this->hasMany(Detalle_pedido::class,'idPedido');
    }
}
