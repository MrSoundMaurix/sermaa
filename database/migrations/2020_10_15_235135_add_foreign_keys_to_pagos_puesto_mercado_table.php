<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPagosPuestoMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos_puesto_mercado', function (Blueprint $table) {
            $table->foreign('id_puestos_mercado', 'puestos_mercado_fk')->references('id')->on('puestos_mercado')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos_puesto_mercado', function (Blueprint $table) {
            $table->dropForeign('puestos_mercado_fk');
        });
    }
}
