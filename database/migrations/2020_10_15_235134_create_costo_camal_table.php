<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostoCamalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costo_camal', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 50)->nullable();
            $table->decimal('valor', 6)->nullable();
            $table->Integer('categoria'); // 0=costos extras(costo-emergencia-bovino; costo-emergencia-porcino; costo-matricula; costo-adicional-no-matricula)
                                          // 1=costos distribución(sin-costo; fuera-mercado)
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costo_camal');
    }
}
