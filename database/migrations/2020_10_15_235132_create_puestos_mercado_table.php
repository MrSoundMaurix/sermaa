<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosMercadoTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('puestos_mercado', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nro_puesto', 20)->nullable();
      //  $table->string('codigo_barra', 15)->nullable();
      $table->bigInteger('id_users')->nullable()->unsigned();
      $table->char('estado_puesto', 1)->nullable(); // A => activo; I=>inectivo
      $table->char('matriculado', 1)->default('N'); // S => SI; N=>NO
      //  $table->integer('id_tipo_pago_mercado')->nullable();
      $table->bigInteger('id_sector_mercado')->nullable()->unsigned();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('puestos_mercado');
  }
}
