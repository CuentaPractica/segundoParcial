<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table='reservas';
    protected $fillable=['idCliente','idEncargado','fechaRecoger','estado'];

    public function clientes()
    {
        return $this->belongsTo(Persona::class,'idCliente');
    }
    public function encargados()
    {
        return $this->belongsTo(Persona::class,'idEncargado');
    }
    public function detallesReservas()
    {
        return $this->hasMany(Detalle_reserva::class,'idReserva');
    }
}
