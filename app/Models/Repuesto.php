<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    public $timestamps = false;
    protected $table='repuestos';
    protected $fillable=['nombre','modelo','precio','stock','idMarca','idCategoria'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class,'idCategoria');
    }
    public function marcas()
    {
        return $this->belongsTo(Marca::class,'idMarca');
    }
    public function detallesVentas()
    {
        return $this->hasMany(Detalle_compra::class,'idRepuesto');
    }
}
