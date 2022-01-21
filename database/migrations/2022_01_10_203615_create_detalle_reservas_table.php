<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idReserva');
            $table->unsignedBigInteger('idRepuesto');
            $table->unsignedBigInteger('idDescuento')->nullable();
            $table->integer('cantidad');
            
            $table->foreign('idReserva')->on('reservas')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_reservas');
    }
}
