<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repuestos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('nombre');
            $table->double('precio')->default(0);
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idMarca');

            $table->foreign('idCategoria')->on('categorias')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idMarca')->on('marcas')->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repuestos');
    }
}
