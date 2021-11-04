<?php

namespace App\Http\Controllers\maps;
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


class MapsController extends Controller
{

	public function index(){

    	return view('maps.inicio');
    }

	public function farmacias(){

    	return view('maps.farmacias');
    }
}