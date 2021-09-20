<?php

namespace App\Http\Controllers\Novedades;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NovedadesController extends Controller
{
    //
    public function index(){

    	return view('novedades.novedades');
    
    }
}
