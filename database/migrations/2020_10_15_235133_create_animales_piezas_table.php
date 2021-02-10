<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalesPiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales_piezas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_animales')->nullable()->unsigned();
            $table->integer('id_ingresos_detalle')->nullable()->unsigned();
            $table->decimal('peso', 5)->nullable();
            $table->decimal('peso_salida', 5)->nullable();
            $table->string('pieza', 50)->nullable();
            $table->string('codigo', 20)->nullable();
            $table->string('codigo_agrocalidad', 15)->nullable();
            $table->integer('estado')->nullable();
            $table->timestamps();
            $table->foreign('id_animales', 'animales_animales_piezas_fk')->references('id')->on('animales')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('id_ingresos_detalle', 'ingresos_detalle_animales_piezas_fk')->references('id')->on('ingresos_detalle')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animales_piezas');
    }
}
