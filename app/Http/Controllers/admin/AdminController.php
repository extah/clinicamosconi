<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagenesDePortada;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

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


    public function addBanners(Request $request)
    //Recibe el form 'agregar un banner o foto de portada'.
    {

    // $reglas = [
    // 'titulo' => 'required|max:120|min:3',
    // 'imagen' => 'required|dimensions:min_width=720,min_height=1280|sometimes|mimes:jpg,png,svg',
    // ];

    // $mensajes = [
    // 'required' => 'El campo :attribute es obligatorio',
    // 'min' => 'El campo :attribute debe tener al menos 3 caracteres',
    // 'max' => 'El campo :attribute puede tener como máximo :max',
    // 'image' => 'Debe seleccionar una imagen tipo .jpg o .png que al menos sea HD'
    // ];

    // $this->validate($request, $reglas, $mensajes);
    
    if($request->hasFile('imagen')){
        $image = $request->file('imagen');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/images/image/'.$filename);
        Image::make($image->getRealPath())->save($path);


        $newBanner = new App\ImagenesDePortada;
        $newBanner->titulo = $request['titulo'];
        $newBanner->imagen = $filename;

        dd($newBanner);
        
        $newBanner->save();
    }    

    return redirect('/admin/imagenes-de-portada');
    }

}