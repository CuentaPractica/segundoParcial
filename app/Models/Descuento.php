<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    public $timestamps = false;
    protected $table='descuentos';
    protected $fillable=['descripcion','porcentajeDescuento'];

    public function detalle_compras()
    {
        return $this->hasOne(Descuento::class,'idDescuento');
    }
}
