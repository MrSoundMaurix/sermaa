<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIngresosDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingresos_detalle', function (Blueprint $table) {
            $table->foreign('id_ingresos', 'ingresos_fk')->references('id')->on('ingresos')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingresos_detalle', function (Blueprint $table) {
            $table->dropForeign('ingresos_fk');
        });
    }
}
