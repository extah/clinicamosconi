<?php

namespace App\Http\Controllers\GuardiaPediatrica;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuardiaPediatricaController extends Controller
{
    //
    public function index(){

    	return view('guardiaPediatrica.guardiaPediatrica');
    
    }
}
