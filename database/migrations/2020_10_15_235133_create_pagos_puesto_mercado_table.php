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
            $table->decimal('valor_total', 9)->nullable();
          //  $table->string('dias', 300)->nullable();
            $table->timestamp('fecha')->nullable();
            $table->timestamp('fecha_pago')->nullable();
            $table->bigInteger('id_puestos_mercado')->nullable()->unsigned();
           // $table->string('tipo_pago', 50)->nullable();
          //  $table->string('mes', 30)->nullable();
            $table->text('observacion')->nullable();
            $table->text('foto')->nullable();
            $table->text('fototype')->nullable();
            $table->integer('responsable_cobro')->nullable();
            $table->bigInteger('id_users')->nullable()->unsigned();
            $table->boolean('pago_realizado')->default(false);
            $table->string('matricula',2)->nullable();  //SI //NO        
            $table->foreign('id_users', 'users_pagos_puesto_mercado_fk')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
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
