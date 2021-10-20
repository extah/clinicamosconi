<?php

use Illuminate\Database\Seeder;
use App\Turnos;

class TurnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Turnos();
        // $especialidad = Especialidades::where('id', 1)->get()->first();
        $p->id_especialidad = 1;
        // $medico = Medico::where('id', 1)->get()->first();
        $p->id_medico = 1;
        $p->id_persona = NULL;
        $p->fecha = date('Y-m-d H:i:s', strtotime('2021-10-28'));
        $p->hora = "08:00"; 
        $p->nro_turno = 1;
        $p->libre = true;
        $p->save();

        $p = new Turnos();
        // $especialidad = Especialidades::where('id', 1)->get()->first();
        $p->id_especialidad = 1;
        // $medico = Medico::where('id', 1)->get()->first();
        $p->id_medico = 1;
        $p->id_persona = NULL;
        $p->fecha = date('Y-m-d H:i:s', strtotime('2021-10-28'));
        $p->hora = "10:00"; 
        $p->nro_turno = 2;
        $p->libre = true;
        $p->save();

        $p = new Turnos();
        // $especialidad = Especialidades::where('id', 1)->get()->first();
        $p->id_especialidad = 1;
        // $medico = Medico::where('id', 1)->get()->first();
        $p->id_medico = 1;
        $p->id_persona = NULL;
        $p->fecha = date('Y-m-d H:i:s', strtotime('2021-10-29'));
        $p->hora = "08:00"; 
        $p->nro_turno = 1;
        $p->libre = true;
        $p->save();


        $p = new Turnos();
        // $especialidad = Especialidades::where('id', 1)->get()->first();
        $p->id_especialidad = 1;
        // $medico = Medico::where('id', 1)->get()->first();
        $p->id_medico = 1;
        $p->id_persona = NULL;
        $p->fecha = date('Y-m-d H:i:s', strtotime('2021-10-29'));
        $p->hora = "09:00"; 
        $p->nro_turno = 2;
        $p->libre = true;
        $p->save();

        $p = new Turnos();
        // $especialidad = Especialidades::where('id', 1)->get()->first();
        $p->id_especialidad = 1;
        // $medico = Medico::where('id', 1)->get()->first();
        $p->id_medico = 1;
        $p->id_persona = NULL;
        $p->fecha = date('Y-m-d H:i:s', strtotime('2021-10-30'));
        $p->hora = "11:00"; 
        $p->nro_turno = 1;
        $p->libre = true;
        $p->save();
    }
}
