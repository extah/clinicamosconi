<?php

namespace App\Http\Controllers\turno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index(){
        // dd("hola");
        $esPaciente = "as";
    	return view('turno.turno', compact('esPaciente'));
    }
}
