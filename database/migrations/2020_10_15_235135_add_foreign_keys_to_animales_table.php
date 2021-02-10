<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnimalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->foreign('id_ingresos_detalle', 'ingresos_detalle_animales_fk')->references('id')->on('ingresos_detalle')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->dropForeign('ingresos_detalle_animales_fk');
        });
    }
}
