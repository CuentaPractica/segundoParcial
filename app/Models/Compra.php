<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compras';
    protected $fillable=['idCliente','idEncargado','montoTotal','idPago'];

    public function clientes()
    {
        return $this->belongsTo(Persona::class,'idCliente');
    }
    public function encargados()
    {
        return $this->belongsTo(Persona::class,'idEncargado');
    }
    public function detallesVentas()
    {
        return $this->hasMany(Detalle_compra::class,'idCompra');
    }
    public function pagos()
    {
        return $this->belongsTo(Pago::class,'idPago');
    }
}
