<?php

namespace App\Http\Controllers\Turnos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use URL;
use Redirect; 

class TurnosController extends Controller
{
    public function index(){
        // dd("hola");
        $esPaciente = "as";
    	return view('turnos.turnos', compact('esPaciente'));
    }

    public function nuevoturnomedico(Request $request)
    {
        $barrios = null;
        $status_error = false;
        $select_especialidad = $request->select_especialidad;
        $especialidad = DB::select("SELECT * FROM especialidades WHERE id = " .$select_especialidad);
        $medico = DB::select("SELECT * FROM medico WHERE id = " .$select_especialidad);
        // dd($especialidad);

        return view('turnos.nuevoTurno_medico', compact('barrios', 'status_error', 'especialidades'));
    }
}
