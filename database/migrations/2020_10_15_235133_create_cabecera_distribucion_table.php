<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabeceraDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabecera_distribucion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre_destinatario', 300)->nullable();
            $table->string('lugar_destino', 200)->nullable();
            $table->timestamp('fecha_actual')->nullable();
            $table->string('placa_transporte', 11)->nullable();
            $table->string('origen_provincia', 200)->nullable();
            $table->string('origen_canton', 200)->nullable();
            $table->string('origen_parroquia', 200)->nullable();
            $table->string('destino_provincia', 200)->nullable();
            $table->string('destino_canton', 200)->nullable();
            $table->string('destino_parroquia', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabecera_distribucion');
    }
}
