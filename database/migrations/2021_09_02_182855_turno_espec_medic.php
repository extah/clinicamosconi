<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Especialidades;
use App\Medico;

class TurnoEspecMedic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('turno_espec_medic', function (Blueprint $table) {

            $table->id();
            $table->foreignId('id_especialidades');
            $table->foreignId('id_medico');
            $table->string('dia', 255)->nullable();
            $table->string('horario', 255)->nullable();
            $table->string('pami', 2)->nullable();
            $table->string('obra_social', 255)->nullable();
            $table->string('consulta_particular', 255)->nullable();
            $table->string('otros', 255)->nullable();
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
