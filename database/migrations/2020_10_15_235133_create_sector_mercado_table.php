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
            $table->bigIncrements('id');
            $table->string('codigo', 10)->nullable();
            $table->string('sector', 75)->nullable();
           // $table->string('subsector', 30)->nullable();
            $table->string('mercado', 50)->nullable();
            $table->char('estado', 1)->nullable(); // A => activo; I=>inactivo
            $table->bigInteger('id_tipo_pago_mercado')->nullable()->unsigned();
           
          

            $table->foreign('id_tipo_pago_mercado', 'tipo_pago_mercado_fk')->references('id')
            ->on('tipo_pago_mercado')->onUpdate('CASCADE')->onDelete('SET NULL');
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
        Schema::table('sector_mercado', function (Blueprint $table) {
            $table->dropForeign('tipo_pago_mercado_fk');
          
        });
    }
}
