<?php

namespace App\Http\Controllers\GuardiaWeb;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuardiaWebController extends Controller
{
    //
    public function index(){

    	return view('guardiaWeb.guardiaWeb');
    
    }
}
