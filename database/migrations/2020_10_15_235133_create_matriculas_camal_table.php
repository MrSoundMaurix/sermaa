<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasCamalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas_camal', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('fecha_matricula')->nullable();
            $table->decimal('costo_matricula',6)->nullable();
            $table->bigInteger('id_users')->nullable()->unsigned();
            $table->integer('responsable_matricula')->nullable();

            $table->foreign('id_users', 'users_matriculas_fk')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas_camal');
    }
}
