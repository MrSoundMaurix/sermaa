<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria')->nullable();// 1=>CAMAL;2=>MERCADO
            $table->string('descripcion', 50)->nullable();
            $table->string('anio', 6)->nullable(); //AÑO
            $table->string('dia', 6)->nullable(); //DIA
            $table->string('mes', 6)->nullable(); //MES
            $table->string('hora', 6)->nullable(); //HORA                                        
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
        Schema::dropIfExists('fechas');
    }
}
