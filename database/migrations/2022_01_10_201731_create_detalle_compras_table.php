<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCompra');
            $table->unsignedBigInteger('idRepuesto');
            $table->unsignedBigInteger('idDescuento')->nullable();
            $table->double('precioUnitario')->default(0);
            $table->integer('cantidad');
            $table->double('precioTotal')->default(0);
            
            $table->foreign('idCompra')->on('compras')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idRepuesto')->on('repuestos')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idDescuento')->on('descuentos')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
