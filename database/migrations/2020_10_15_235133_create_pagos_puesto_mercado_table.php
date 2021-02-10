<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosPuestoMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_puesto_mercado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->decimal('valor_total', 6)->nullable();
            $table->string('dias', 300)->nullable();
            $table->timestamp('fecha')->nullable();
            $table->integer('id_puestos_mercado')->nullable();
            $table->string('tipo_pago', 50)->nullable();
            $table->string('mes', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos_puesto_mercado');
    }
}
