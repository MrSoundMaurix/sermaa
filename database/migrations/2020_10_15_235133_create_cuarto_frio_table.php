<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuartoFrioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuarto_frio', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('fecha_actual')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
            $table->integer('total_piezas')->nullable();

            $table->string('pieza', 25)->nullable();
            $table->string('especie', 15)->nullable();
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
        Schema::dropIfExists('ingresos');
    }
}
