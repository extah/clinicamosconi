<?php

namespace App\Http\Controllers\Galeria;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ImagenesDePortada;


use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use DB;
use URL;
use Redirect;

class GaleriaController extends Controller
{
    //
    public function index(){

        $imagenes = ImagenesDePortada::where('tipo', 'galeria')->get();

    	return view('galeria.galeria', compact('imagenes'));
    
    }
}
