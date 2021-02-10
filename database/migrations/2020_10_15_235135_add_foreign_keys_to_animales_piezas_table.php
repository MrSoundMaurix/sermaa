<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnimalesPiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animales_piezas', function (Blueprint $table) {
            $table->foreign('id_animales', 'animales_fk')->references('id')->on('animales')->onUpdate('CASCADE')->onDelete('SET NULL');
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
        Schema::table('animales_piezas', function (Blueprint $table) {
            $table->dropForeign('animales_fk');
            $table->dropForeign('ingresos_detalle_fk');
        });
    }
}
