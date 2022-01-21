<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_reserva extends Model
{
    public $timestamps = false;
    protected $table='detalle_reservas';
    protected $fillable=['idCompra','idRepuesto','idDescuento','cantidad'];

    public function reservas()
    {
        return $this->belongsTo(Reserva::class,'idReserva');
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
