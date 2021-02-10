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
            $table->increments('id');
            // $table->char('especie', 1)->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('genero')->nullable();
          // $table->integer('emergencia')->nullable();
            $table->decimal('costo_unitario', 6)->nullable();
            $table->decimal('subtotal', 6)->nullable();
            $table->integer('id_ingresos')->nullable();
            $table->integer('total_piezas')->nullable();
            $table->integer('id_costo_faenamiento')->nullable();
            $table->integer('estado')->default(0);
            $table->integer('cantidad_emergencia');
            $table->decimal('costo_unitario_emergencia', 6)->nullable();
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
