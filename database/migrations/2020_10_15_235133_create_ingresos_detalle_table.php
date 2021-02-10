<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_detalle', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('especie', 1)->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('costo_unitario', 6)->nullable();
            $table->integer('id_ingresos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos_detalle');
    }
}
