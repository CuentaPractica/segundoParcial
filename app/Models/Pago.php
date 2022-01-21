<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public $timestamps = false;
    protected $table='pagos';
    protected $fillable=['tipoPago'];

    public function ventas()
    {
        return $this->hasOne(Compra::class,'idPago');
    }
}
