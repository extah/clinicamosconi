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
            $table->string('nombreyApellido', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->bigInteger('dni')->nullable();
            $table->string('contrasena', 255)->nullable();
            $table->date('fecha_nacimiento', 0)->nullable();
            $table->string('obra_social', 255)->nullable();
            $table->bigInteger('nro_afiliado')->nullable();
            $table->string('admin', 1)->nullable();
            $table->timestamps();
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
