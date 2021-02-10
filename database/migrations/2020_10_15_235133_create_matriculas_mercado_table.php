<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas_mercado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('fecha_matricula')->nullable();
            $table->decimal('costo_matricula', 6)->nullable();
            $table->bigInteger('id_puestos_mercado')->nullable()->unsigned();
            $table->boolean('multa')->default(false);
            $table->integer('responsable_matricula')->nullable();
            $table->string('tipo_matricula')->nullable();

            $table->foreign('id_puestos_mercado', 'puestos_mercado_fk2')->references('id')->on('puestos_mercado')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas_mercado');
    }
}
