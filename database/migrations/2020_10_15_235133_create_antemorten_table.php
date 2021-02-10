<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntemortenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antemorten', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('fecha')->nullable();
            $table->string('especie', 15)->nullable();
            $table->string('lugar_procedencia', 100)->nullable();
            $table->string('csmi', 20)->nullable();
            $table->string('nro_lote', 20)->nullable();
            $table->string('etapa_productiva', 100)->nullable();
            $table->integer('nro_machos')->nullable();
            $table->integer('nro_hembras')->nullable();
            $table->integer('total_animales')->nullable();
            $table->integer('nro_animales_muertos')->nullable();
            $table->string('causa_probable', 120)->nullable();
            $table->integer('decomiso')->nullable();
            $table->integer('aprovechamiento')->nullable();
            $table->integer('nro_sindrome_nervioso')->nullable();
            $table->integer('nro_sindrome_digestivo')->nullable();
            $table->integer('nro_sindrome_vesicular')->nullable();
            $table->integer('nro_sindrome_respiratorio')->nullable();
            $table->string('tipo_secrecion', 50)->nullable();
            $table->integer('nro_cojera')->nullable();
            $table->integer('nro_ambulatorios')->nullable();
            $table->integer('nro_matanza_normal')->nullable();
            $table->integer('nro_matanza_especial')->nullable();
            $table->integer('nro_matanza_emergencia')->nullable();
            $table->integer('nro_aplazamiento_matanza')->nullable();
            $table->text('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antemorten');
    }
}
