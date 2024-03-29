<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('medico', function (Blueprint $table) {
            $table->id();
            $table->string('numero_matricula', 255)->nullable();
            $table->string('nombre', 255)->nullable();
            $table->string('apellido', 255)->nullable();
            $table->dateTime('fecha_nacimiento', 0)->nullable();
            $table->bigInteger('dni')->nullable();
            $table->bigInteger('cuit')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('email', 255)->nullable();
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
        //
    }
}
