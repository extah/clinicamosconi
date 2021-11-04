<?php

namespace App\Http\Controllers\Novedades;
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

class NovedadesController extends Controller
{
    //
    public function index(){

        $noticias = ImagenesDePortada::where('tipo', 'noticias')->orderBy('id', 'desc')->get();

    	return view('novedades.novedades', compact('noticias'));
    
    }
}
