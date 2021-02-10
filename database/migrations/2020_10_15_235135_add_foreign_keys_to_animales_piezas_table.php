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
            $table->dropForeign('animales_animales_piezas_fk');
            $table->dropForeign('ingresos_detalle_animales_piezas_fk');
        });
    }
}
