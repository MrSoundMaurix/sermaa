<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_mercado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('tipo_usuario', 1)->nullable();
            $table->timestamps();
            $table->string('cedula', 13);
            $table->string('nombres', 200)->nullable();
            $table->string('apellidos', 200)->nullable();
            $table->string('telefono', 13)->nullable();
            $table->string('direccion', 300)->nullable();
            $table->text('foto')->nullable();
            $table->text('fototype')->nullable();
            $table->char('estado', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_mercado');
    }
}
