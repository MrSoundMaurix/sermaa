<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCuartoFrioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuarto_frio', function (Blueprint $table) {
            $table->foreign('id_ingresos_detalle', 'ingresos_detalle_fk')->references('id')->on('ingresos_detalle')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuarto_frio', function (Blueprint $table) {
            $table->dropForeign('ingresos_detalle_fk');
        });
    }
}
