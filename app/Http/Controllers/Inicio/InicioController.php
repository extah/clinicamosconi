<?php

namespace App\Http\Controllers\Inicio;
use App\Http\Controllers\Controller;
use App\ImagenesDePortada;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use DB;
use URL;
use Redirect; 


class InicioController extends Controller
{

	public function index(){

	    $inicio = "";
		$esEmp = false;
		$banners = ImagenesDePortada::all()->where('tipo', 'img');
	   
    	return view('inicio.inicio', compact('inicio', 'esEmp', 'banners'));
    }


}