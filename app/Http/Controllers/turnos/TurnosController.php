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

}
