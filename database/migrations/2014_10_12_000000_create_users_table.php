<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->string('cedula', 13)->nullable();
            $table->string('nombres', 200)->nullable();
            $table->string('apellidos', 200)->nullable();
            $table->string('telefono', 13)->nullable();
            $table->string('direccion', 300)->nullable();
            $table->integer('estado')->nullable();
            $table->boolean('estado_matricula')->default(false);
            $table->string('codigo', 30)->nullable()->unique();
            $table->text('foto')->nullable();
            $table->text('fototype')->nullable();
            $table->decimal('matricula', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
