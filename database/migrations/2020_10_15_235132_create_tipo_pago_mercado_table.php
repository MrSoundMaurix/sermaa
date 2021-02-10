<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPagoMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pago_mercado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion', 100)->nullable();
            $table->decimal('valor_pago', 8)->nullable();
            $table->Integer('categoria');
            $table->string('estadia', 20)->nullable(); //PERMANENTE , EVENTUAL , OCASIONAL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_pago_mercado');
    }
}
