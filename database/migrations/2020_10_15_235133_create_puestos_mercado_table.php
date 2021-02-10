<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos_mercado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('nro_puesto')->nullable();
            $table->string('codigo_barra', 15)->nullable();
            $table->integer('id_usuarios_mercado')->nullable();
            $table->char('estado_puesto', 1)->nullable();
            $table->integer('id_tipo_pago_mercado')->nullable();
            $table->integer('id_sector_mercado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puestos_mercado');
    }
}
