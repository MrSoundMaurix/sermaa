<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_mercado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codigo')->nullable();
            $table->string('sector', 50)->nullable();
            $table->string('subsector', 30)->nullable();
            $table->string('mercado', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector_mercado');
    }
}
