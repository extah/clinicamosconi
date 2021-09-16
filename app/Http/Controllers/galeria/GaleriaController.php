<?php

namespace App\Http\Controllers\Galeria;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GaleriaController extends Controller
{
    //
    public function index(){

    	return view('galeria.galeria');
    
    }
}
