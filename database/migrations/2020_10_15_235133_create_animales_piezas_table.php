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
            $table->integer('id_animales')->nullable();
            $table->integer('id_ingresos_detalle')->nullable();
            $table->decimal('peso', 5)->nullable();
            $table->string('pieza', 50)->nullable();
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
