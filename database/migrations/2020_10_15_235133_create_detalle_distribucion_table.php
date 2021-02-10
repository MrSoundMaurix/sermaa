<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_distribucion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('especie', 20)->nullable();
            $table->integer('id_cabecera_distribucion')->nullable();
            $table->string('producto', 30)->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('codigo_animal_pieza', 20)->nullable();
            $table->string('numero_id', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_distribucion');
    }
}
