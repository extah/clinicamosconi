<?php

namespace App\Http\Controllers\Contacto;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactoController extends Controller
{
    public function index(){

    	return view('contacto.contacto');
    
    }
}