<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPuestosMercadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('puestos_mercado', function (Blueprint $table) {
            $table->foreign('id_usuarios_mercado', 'usuarios_mercado_fk')->references('id')->on('usuarios_mercado')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('id_tipo_pago_mercado', 'tipo_pago_mercado_fk')->references('id')->on('tipo_pago_mercado')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('id_sector_mercado', 'sector_mercado_fk')->references('id')->on('sector_mercado')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puestos_mercado', function (Blueprint $table) {
            $table->dropForeign('usuarios_mercado_fk');
            $table->dropForeign('tipo_pago_mercado_fk');
            $table->dropForeign('sector_mercado_fk');
        });
    }
}
