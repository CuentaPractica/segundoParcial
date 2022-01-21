<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;
    protected $table='personas';
    protected $fillable=['nombre','apellidos','CI','telefono','empresa','direccion','tipo'];

    public function usuarios()
    {
        return $this->hasOne(User::class, 'idPersona');
    }
    public function clientes()
    {
        return $this->hasOne(Compra::class, 'idCliente');
    }
    public function encargados()
    {
        return $this->hasOne(Compra::class, 'idEncagado');
    }
    public function proveedores()
    {
        return $this->hasOne(Pedido::class, 'idProveedor');
    }
}
