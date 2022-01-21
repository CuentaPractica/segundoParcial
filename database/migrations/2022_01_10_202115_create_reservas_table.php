<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fechaRecoger');
            $table->boolean('estado');
            $table->unsignedBigInteger('idEncargado');
            $table->unsignedBigInteger('idCliente');

            $table->foreign('idEncargado')->on('personas')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idCliente')->on('personas')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
