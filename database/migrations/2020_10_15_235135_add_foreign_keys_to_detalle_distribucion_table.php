<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleDistribucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_distribucion', function (Blueprint $table) {
            $table->foreign('id_cabecera_distribucion', 'cabecera_distribucion_fk')->references('id')->on('cabecera_distribucion')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_distribucion', function (Blueprint $table) {
            $table->dropForeign('cabecera_distribucion_fk');
        });
    }
}
