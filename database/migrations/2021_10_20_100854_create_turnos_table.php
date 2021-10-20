<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_especialidad');
            $table->foreignId('id_medico');
            $table->foreignId('id_persona')->nullable();
            $table->string('obra_social', 255)->nullable();
            $table->date('fecha', 0)->nullable();
            $table->string('hora', 255)->nullable();
            $table->bigInteger('nro_turno')->nullable();
            $table->boolean('libre')->nullable();
            $table->bigInteger('id_comprobante')->nullable();
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
        Schema::dropIfExists('turnos');
    }
}
