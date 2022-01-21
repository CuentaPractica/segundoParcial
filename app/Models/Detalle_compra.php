<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_compra extends Model
{
    public $timestamps = false;
    protected $table='detalle_compras';
    protected $fillable=['idCompra','idRepuesto','idDescuento','precioUnitario','cantidad','precioTotal'];

    public function ventas()
    {
        return $this->belongsTo(Compra::class,'idCompra');
    }
    public function repuestos()
    {
        return $this->belongsTo(Repuesto::class,'idRepuesto');
    }
    public function descuentos()
    {
        return $this->belongsTo(Descuento::class,'idDescuento');
    }
}
