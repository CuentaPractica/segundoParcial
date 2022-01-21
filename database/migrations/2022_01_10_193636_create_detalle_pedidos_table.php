<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPedido');
            $table->unsignedBigInteger('idRepuesto');
            $table->double('precioUnitario')->default(0);
            $table->integer('cantidad');
            $table->double('precioTotal')->default(0);
            
            $table->foreign('idPedido')->on('pedidos')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idRepuesto')->on('repuestos')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
