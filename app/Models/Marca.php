<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $timestamps = false;
    protected $table='marcas';
    protected $fillable=['nombre'];

    public function repuestos()
    {
        return $this->hasMany(Repuesto::class,'idMarca');
    }
}
