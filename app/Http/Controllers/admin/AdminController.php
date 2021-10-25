<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagenesDePortada;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Users;

use Auth;
use DB;
use URL;
use Redirect; 

class AdminController extends Controller
{
    public function index(){

    	return view('admin.login');
    
    }

    public function login(Request $request) {
        // dd($request);
        $inicio = "";
        $email = $request->email;
        $contrasena = $request->password;
        // dd($usuario . ' ' . $contrasena);
        $status_info = true;

        $login =  DB::select("SELECT * FROM users where email = '" . $email . "' AND admin = 1" );
       
        if(count($login) == 0)
		{
            $inicio = "";    
            $status_error = true;
            $esPasc = false;
            $message = "Usuario/Contraseña Incorrecta ";
            // return view('portaldelpaciente.index', compact('inicio','status_error', 'esPasc'));
            return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
		}
        else{
            
            $contrasenasql = $login[0]->contrasena;
            if(password_verify($contrasena, $contrasenasql))
            {
                $message = "Bienvenido/a ";
                $status_ok = true;
                $esPasc = true;

                // $request->session()->flush();
                // dd($login[0]->cuit);
                session(['usuario'=>$login[0]->email, 'nombre'=>$login[0]->nombreyApellido]);

                $usuario =  Users::get_registro($login[0]->email);
                // return view('portaldelpaciente.usuario', compact('inicio', 'esPasc', 'usuario', 'email',  'status_ok', 'message'));
                return view('admin.imagenes_de_portada');
                
            }
            else
            {
                $message = "Usuario/Contraseña Incorrecta ";
                $status_error = true;
                $status_ok = false;
                $esPasc = false;
                
                // return view('portaldelpaciente.index', compact('inicio', 'message', 'status_error', 'esPasc'));
                return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
                
            }
        }
        
    }

    public function imagenes(Request $request){        

        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);
        if($result == "OK")
        {
            return view('admin.imagenes_de_portada');
        }

        $message = "Inicie Sesion";
        $status_error = true;
        $status_ok = false;
        $esPasc = false;
        
        // return view('portaldelpaciente.index', compact('inicio', 'message', 'status_error', 'esPasc'));
        return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
    }

    public function imagenesagregar(Request $request)
    {

        $opcion = $request->opcion;
        $titulo_imagen = $request->titulo;
        $tipo_imagen = $request->tipo;

        $originalImage= $request->file('imagen');

        $original_name = $originalImage->getClientOriginalName();

        if ($opcion == 1) {
            $originalPath = public_path().'/images/' . $tipo_imagen . "/";
            $imagenexiste = ImagenesDePortada::where('imagen', '=',  $original_name)->get();
            
            if ($imagenexiste->count() == 0){

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->save($originalPath.$originalImage->getClientOriginalName());
    
                $imagen   = new ImagenesDePortada;
                $imagen->titulo= $titulo_imagen;
                $imagen->imagen = $original_name;
                $imagen->tipo = $tipo_imagen;
                // $imagen->imagen = "imagen";
                $imagen->save(); 
            }

        }elseif ($opcion == 2) {

            $id = $request->id;
            $imagenexiste = ImagenesDePortada::where('id', '=',  $id)->get();
            // dd($imagenexiste[0]->imagen);
            $originalPathDelete = public_path().'/images/' . $imagenexiste[0]->tipo . "/";
            $originalPathAdd = public_path().'/images/' . $tipo_imagen . "/";

            if ($imagenexiste->count() != 0){
                $image_path = $originalPathDelete . $imagenexiste[0]->imagen;
                unlink($image_path);

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->save($originalPathAdd.$originalImage->getClientOriginalName());

                DB::table('imagenesdeportada')->where('id',$id)->update(['titulo' => $titulo_imagen, 'imagen' => $original_name, 'tipo' => $tipo_imagen]);
                
            }
           
           
        }

        $limit = " LIMIT 500";        
        $orderby = " ORDER BY imagenesdeportada.id DESC ";

        $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.tipo, imagenesdeportada.created_at, imagenesdeportada.updated_at
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
                    // $originalPath = public_path().'/images/img/';

                    $imagenexiste = ImagenesDePortada::where('id', '=',  $id)->get();
                    $originalPathDelete = public_path().'/images/' . $imagenexiste[0]->tipo . "/";
                    $image_path = $originalPathDelete . $imagenexiste[0]->imagen;
                    unlink($image_path);

                    $imagen = imagenesdeportada::get_registro($id);
                    $imagen->delete($id);   


                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesdeportada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.tipo, imagenesdeportada.created_at, imagenesdeportada.updated_at
                    FROM imagenesdeportada        
                        ".$orderby." ".$limit));
                    break;

                case 4: 
                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesdeportada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.tipo, imagenesdeportada.created_at, imagenesdeportada.updated_at
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


    public function cerrarsesion(Request $request)
    {

        $id = session()->getId();

        // $directory = 'C:\xampp\htdocs\recibodesueldo\storage\framework\sessions';
        // $ignoreFiles = ['.gitignore', '.', '..'];
        // $files = scandir($directory);
        
        // foreach ($files as $file) {
        //     $var = $file;
        //     if($var == $id)
        //     {
        //         if(!in_array($file,$ignoreFiles)) unlink($directory . '/' . $file);
        //     }
        //     else {

        //     }
            // if(!in_array($file,$ignoreFiles)) unlink($directory . '/' . $file);
        // }

        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            $request->session()->flush();
        }
        $inicio = "";    
        $esEmp = false;
        $status_error = false;
        $status_info = false;
        // return view('inicio.inicio', compact('inicio','status_error', 'esEmp', 'status_info'));
        return redirect('admin');

    }
    function isUsuario($usuario)
    {
        # code...
        if($usuario == null)
        {
            return "NO OK";
        }
 
        return "OK";

    }
}