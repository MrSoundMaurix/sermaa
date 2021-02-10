<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIngresosDetalleCostoFaenamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingresos_detalle', function (Blueprint $table) {
            $table->foreign('id_costo_faenamiento', 'costo_faenamiento_fk')->references('id')->on('costo_faenamiento')->onUpdate('CASCADE')->onDelete('SET NULL');
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
            $table->dropForeign('costo_faenamiento_fk');
        });
    }
}
