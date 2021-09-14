<?php

namespace App\Http\Controllers\Diagnostico;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DiagnosticoController extends Controller
{
    public function index(){

    	return view('diagnostico.diagnostico');
    
    }
}
