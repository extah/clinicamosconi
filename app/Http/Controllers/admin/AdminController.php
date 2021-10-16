<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagenesDePortada;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

use Auth;
use DB;
use URL;
use Redirect; 

class AdminController extends Controller
{
    public function index(){

    	return view('admin.admin');
    
    }

    public function login() {
        return view('admin.login');
    }

    public function banners(){
        // $banners = ImagenesDePortada::all();
        // dd($banners);

        // $limit = " LIMIT 500";        
        // $orderby = " ORDER BY imagenesdeportada.id DESC ";

        // $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.created_at, imagenesdeportada.updated_at
        // FROM imagenesdeportada        
        //     ".$orderby." ".$limit));

        // print json_encode($data, JSON_UNESCAPED_UNICODE);
        // return datatables()->of($data)->toJson();

        // return view('admin.imagenes_de_portada', compact('banners'));
        // $imagenexiste = ImagenesDePortada::where('id', '=',  6)->get();
        // $originalPath = public_path().'/images/img/';
        // $image_path = $originalPath . $imagenexiste[0]->imagen;
        // unlink($image_path);
        // if (File::exists($image_path)) {
        //         dd($image_path);
        // }
        // dd("no existe");
        

        return view('admin.imagenes_de_portada');
    }

    public function imagenesagregar(Request $request)
    {

        $opcion = $request->opcion;
        $titulo_imagen = $request->titulo;
        $originalImage= $request->file('imagen');
        $originalPath = public_path().'/images/img/';
        $original_name = $originalImage->getClientOriginalName();

        if ($opcion == 1) {
 
            $imagenexiste = ImagenesDePortada::where('imagen', '=',  $original_name)->get();
            
            if ($imagenexiste->count() == 0){

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->save($originalPath.$originalImage->getClientOriginalName());
    
                $imagen   = new ImagenesDePortada;
                $imagen->titulo= $titulo_imagen;  
                $imagen->imagen = $original_name;  
                // $imagen->imagen = "imagen";
                $imagen->save(); 
            }

        }elseif ($opcion == 2) {

            $id = $request->id;
            $imagenexiste = ImagenesDePortada::where('id', '=',  $id)->get();
            // dd($imagenexiste[0]->imagen);
            

            if ($imagenexiste->count() != 0){
                $image_path = $originalPath . $imagenexiste[0]->imagen;
                unlink($image_path);

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->save($originalPath.$originalImage->getClientOriginalName());

                DB::table('imagenesdeportada')->where('id',$id)->update(['titulo' => $titulo_imagen, 'imagen' => $original_name]);
                
            }
           
           
        }

        $limit = " LIMIT 500";        
        $orderby = " ORDER BY imagenesdeportada.id DESC ";

        $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.created_at, imagenesdeportada.updated_at
        FROM imagenesdeportada        
            ".$orderby." ".$limit));
        
        return json_encode($data, JSON_UNESCAPED_UNICODE);

        // return response()->json(["code"=>1, "msg"=>"muy bien"]);
        
    }
    public function imageneseliminareditar(Request $request)
    {

        // $usuario = $request->session()->get('usuario');
        // $result = $this->isUsuario($usuario);
        $result = "OK";
       
            
        if($result == "OK"){
            
            $opcion = $request->opcion;
            // $opcion = $request->input("opcion");
            // $titulo = $request->input("titulo");
            // $titulo = $request->titulo;
            switch($opcion){

                case 1:
                
                    //Agregar  

                    break;    
                case 2: 
                    //Actualizar

                    break;
                case 3: 
                    //borrar
                    $id = $request->input("id");
                    $imagen = imagenesdeportada::get_registro($id);
                    $imagen->delete($id);   

                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesdeportada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.created_at, imagenesdeportada.updated_at
                    FROM imagenesdeportada        
                        ".$orderby." ".$limit));
                    break;

                case 4: 
                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesdeportada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.created_at, imagenesdeportada.updated_at
                    FROM imagenesdeportada        
                        ".$orderby." ".$limit));
                    break;
                
            }

            return json_encode($data, JSON_UNESCAPED_UNICODE);

        }
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