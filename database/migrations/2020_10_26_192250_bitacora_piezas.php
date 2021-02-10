<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BitacoraPiezas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_piezas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('fecha')->nullable();
            $table->string('accion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('total_piezas')->nullable();
            $table->decimal('peso',6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_piezas');
    }
}
