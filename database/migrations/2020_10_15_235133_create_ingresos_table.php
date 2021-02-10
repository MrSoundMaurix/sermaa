<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('fecha_ingreso')->nullable();
            $table->decimal('costo_total')->nullable();
            $table->bigInteger('id_users')->nullable()->unsigned();
            $table->integer('estado')->nullable();
            $table->string('medio_movilizacion', 20)->nullable();
            $table->string('placa_transporte', 11)->nullable();
            $table->string('condicion_transporte', 100)->nullable();
            $table->string('lugar_procedencia')->nullable();
            $table->string('numero_factura', 20)->nullable();
            $table->string('estado_pdf',2)->nullable(); //SI //NO
            $table->string('matricula',10)->nullable();// 1o 2//valor o fecha de matricula
            $table->text('observaciones')->nullable();
            $table->string('csmi', 20)->nullable();
            $table->timestamp('fecha_faenamiento')->nullable();
            $table->integer('responsable_recepcion')->nullable();
            $table->string('responsable_recepcion_datos',50)->nullable();
            $table->integer('validar_transporte')->default(0);
            $table->string('t_animal'); //cantB,cantP,cantBH,cantBM,cantPH,cantPM,cantEmergenciaB,cantEmergenciaP
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
