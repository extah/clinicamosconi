<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagenesDePortada;

class AdminController extends Controller
{
    public function index(){

    	return view('admin.admin');
    
    }

    public function login() {
        return view('admin.login');
    }

    public function banners(){
        $banners = ImagenesDePortada::all();

        return view('admin.imagenes_de_portada', compact('banners'));
    }

    // public function addBanners(Request $request) {
    //     return view('admin.imagenes_de_portada');
    // }
}