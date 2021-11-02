<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ImagenesDePortada;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

use App\Users;
use App\Turnos;
use App\Medico;
use App\Comprobante;
use App\Especialidades;

use Auth;
use DB;
use URL;
use Redirect; 

class AdminController extends Controller
{
    public function printImages() {
        $banners = ImagenesDePortada::all();

        dd($banners);
        return view('template.template', compact('banners'));
    }

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
        $descripcion = $request->descripcion;
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
                $imagen->descripcion = $descripcion;
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

                DB::table('imagenesdeportada')->where('id',$id)->update(['titulo' => $titulo_imagen, 'imagen' => $original_name, 'tipo' => $tipo_imagen, 'descripcion' => $descripcion]);
                
            }
           
           
        }

        $limit = " LIMIT 500";        
        $orderby = " ORDER BY imagenesdeportada.id DESC ";

        $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.tipo, imagenesdeportada.descripcion, imagenesdeportada.created_at, imagenesdeportada.updated_at
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
            
                    $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.tipo, imagenesdeportada.descripcion, imagenesdeportada.created_at, imagenesdeportada.updated_at
                    FROM imagenesdeportada        
                        ".$orderby." ".$limit));
                    break;

                case 4: 
                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesdeportada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesdeportada.id, imagenesdeportada.titulo, imagenesdeportada.imagen, imagenesdeportada.tipo, imagenesdeportada.descripcion, imagenesdeportada.created_at, imagenesdeportada.updated_at
                    FROM imagenesdeportada        
                        ".$orderby." ".$limit));
                    break;
                
            }

            return json_encode($data, JSON_UNESCAPED_UNICODE);

        }
    }

    public function turnos(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            return view('admin.turnos');
        }

        $message = "Inicie Sesion";
        $status_error = true;
        $status_ok = false;
        $esPasc = false;
        
        return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
    }

    //Agregar turnos admin
    public function agregarturno(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            // return view('admin.agregarturno');
            return "agregar turnos";
        }

        $message = "Inicie Sesion";
        $status_error = true;
        $status_ok = false;
        $esPasc = false;
        
        return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
    }

    public function generarturnos(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            // return view('admin.agregarturno');
            $medicos =  DB::select("SELECT * FROM medico");
            return view('admin.generarturnos', compact('medicos'));
        }

        $message = "Inicie Sesion";
        $status_error = true;
        $status_ok = false;
        $esPasc = false;
        
        return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
    }

    public function generarturnospost(Request $request)
    {
        // $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
        // $fecha_desde = $fecha_actual->format('Y-m-d');
        // $fecha = date("Y-m-d", strtotime($request->fecha_desde));
        $fecha_desde = date("Y-m-d", strtotime($request->fecha_desde));
        $fecha_hasta = date("Y-m-d", strtotime($request->fecha_hasta));
        // $fecha_hasta = date("Y-m-d",strtotime($fecha_actual."+ 1 month"));
        $lapzo_tiempo = 15;
        // $dia_actual = date("N",strtotime($fecha_desde));
        // dd($dia_actual);

        $medicos =  DB::select("SELECT * FROM medico");
        $medico_seleccionado = $request->select_medico;
        if ($medico_seleccionado == "todos") {
            
            $array_numeric_keys = array();

            foreach ($medicos as $key => $value) {
                    $array_numeric_keys[] = $key+1;
            }
            $existe = DB::select("SELECT * FROM `turnos` WHERE fecha BETWEEN ' $fecha_desde' AND '$fecha_hasta'");
            if (count($existe)) {
                // dd("hay turnos para la fecha");
                // $medicos =  DB::select("SELECT * FROM medico");
                $message = "Existen turnos para la fecha";
                $status_info = true;
                $status_ok = false;
                // return view('admin.generarturnos', compact('medicos'));
                return redirect('admin/generarturnos')->with(['status_info' => $status_info, 'status_ok' => $status_ok,  'message' => $message, 'medicos' => $medicos]);
            }
            // return $array_numeric_keys;
            $result = $this->genera_calendario($array_numeric_keys, $fecha_desde, $fecha_hasta, $lapzo_tiempo);
            if ($result == "OK") {

                // $medicos =  DB::select("SELECT * FROM medico");
                $message = "Turnos creado";
                $status_info = false;
                $status_ok = true;
                // return view('admin.generarturnos', compact('medicos'));
                return redirect('admin/generarturnos')->with(['status_info' => $status_info, 'status_ok' => $status_ok,  'message' => $message, 'medicos' => $medicos]);
            }
	
        }
        else
        {
            
            $existe = DB::select("SELECT * FROM `turnos` WHERE fecha BETWEEN ' $fecha_desde' AND '$fecha_hasta' AND id_medico = $medico_seleccionado");
            if (count($existe)) {
                // dd("hay turnos para la fecha");
                // $medicos =  DB::select("SELECT * FROM medico");
                $message = "Existen turnos para la fecha";
                $status_info = true;
                $status_ok = false;
                // return view('admin.generarturnos', compact('medicos'));
                return redirect('admin/generarturnos')->with(['status_info' => $status_info, 'status_ok' => $status_ok,  'message' => $message, 'medicos' => $medicos]);
            }

            return $request->select_especialidad;
        }
    }

    function genera_calendario($array_numeric_keys, $fecha_desde_param, $fecha_hasta_param, $lapzo_tiempo_param){

		$feriados =  DB::select("SELECT * FROM tab_feriados WHERE fecha BETWEEN ' $fecha_desde_param' AND '$fecha_hasta_param'");

		$mes_hasta = date("m",strtotime($fecha_hasta_param));
        $dia_desde = date("d",strtotime($fecha_desde_param));
        $dia_hasta = date("d",strtotime($fecha_hasta_param));

        // dd($dia_desde . '   ,  ' . $dia_hasta);
        // dd($mes_hasta);


		$fecha = $fecha_desde_param;
        $mes = date("m",strtotime($fecha));
        $ok = true;
        $dia_actual = date("d",strtotime($fecha));

		while ($fecha <= $fecha_hasta_param)
		{	
			
            $dia_actual = date("N",strtotime($fecha));
            
            $dia_nombre = $this->getDia($dia_actual);
            dd($dia_nombre);

            $es_feriado = array_values(array_filter($feriados, function($obj) use ($fecha)
            {
                return $obj->fecha == $fecha;
            }));
            
            if (sizeof($es_feriado) == 0){
                //echo $fecha, PHP_EOL; 
                $Hora = "08:00";
                // for ($i=1; $i < $cant + 1; $i++) { 

                    // if($Hora <= "13:30")
                    $i=1;
                    while($Hora <= "11:00")
                    {
                        DB::insert("insert into turnos 
                        (id_especialidad, id_medico, id_persona, fecha, hora, nro_turno, libre)
                        values(1, 1, 0,'".$fecha."','".$Hora."',".$i.",1)"); 

                        $Hora = date("H:i", strtotime($Hora)+($lapzo_tiempo_param*60));
                        $i++;
                        // echo $Hora, PHP_EOL;
                    }
            }
			

			$fecha = date('Y-m-d', strtotime($fecha. ' + 1 days'));
            
			$mes = date("m",strtotime($fecha));
            $dia_actual = date("d",strtotime($fecha));
			//echo $mes, PHP_EOL; 
        }
        // dd("termino");
     return "OK";    
    }    

    function getDia($dia_num)
    {
        if ($dia_num == 1) 
        {
            return "Lunes";
        }
        elseif($dia_num == 2)
        {
            return "Martes";
        }
        elseif ($dia_num == 3) 
        {
            return "Miércoles";
        }
        elseif ($dia_num == 4) 
        {
            return "Jueves";
        }
        elseif ($dia_num == 5) 
        {
            return "Viernes";
        }
        elseif ($dia_num == 6) 
        {
            return "Sábado";
        }
        else
        {
            return "Domingo";
        }
    }

    function isWeekend($date) {
	    $weekDay = date('w', strtotime($date));
	    return ($weekDay == 0 || $weekDay == 6);
	}

    public function tablaturnos(Request $request)
    {

        // $usuario = $request->session()->get('usuario');
        // $result = $this->isUsuario($usuario);
        $result = "OK";
       
            
        if($result == "OK"){
            
            if ($request->opcion == NULL) {
                $opcion = $request->opcion_buscar;
            } else {
                $opcion = $request->opcion;
            }
            
            
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
                    $id_comprobante = $request->id_comprobante;
                    $turno  = Turnos::get_registro_por_comprobante($id_comprobante);
                    DB::beginTransaction();

                    try{

                        $turno->id_persona = 0;
                        $turno->libre = 1;
                        $turno->id_comprobante = 0;
                        $turno->save();
                        
                        DB::commit();
                    }catch(\Exception $e)
                    {
                        DB::rollBack();
                        $error = "3";
                        $descError = "Error al grabar ".$e;
                        throw $e;
                    }       

                    // $limit = " LIMIT 2000";        
                    $orderby = " ORDER BY turnos.id DESC ";

                    $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
                    $date = $fecha_actual->format('Y-m-d');
                    $hora_actual =  $fecha_actual->format('H:i');

                    $fecha_3meses = date("Y-m-d",strtotime($fecha_actual."+ 3 month"));
            
                    $data = DB::select(DB::raw("SELECT turnos.id,  especialidades.nombre as especialidad, CONCAT(medico.nombre, ' ', medico.apellido) as medico, users.nombreyApellido as persona, turnos.fecha, turnos.hora
                    FROM turnos
                    INNER JOIN especialidades ON turnos.id_especialidad = especialidades.id
                    INNER JOIN medico ON turnos.id_medico = medico.id
                    INNER JOIN users ON turnos.id_persona = users.id
                    WHERE turnos.fecha BETWEEN '$date' AND '$fecha_3meses'
                    AND turnos.libre = 0
                    ".$orderby));
                    break;

                case 4: 
                    // $limit = " LIMIT 2000";
                    $orderby = " ORDER BY turnos.id DESC ";

                    $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
                    $date = $fecha_actual->format('Y-m-d');
                    $hora_actual =  $fecha_actual->format('H:i');

                    $fecha_3meses = date("Y-m-d",strtotime($fecha_actual."+ 3 month"));
            
                    $data = DB::select(DB::raw("SELECT turnos.id,  especialidades.nombre as especialidad, CONCAT(medico.nombre, ' ', medico.apellido) as medico, users.nombreyApellido as persona, turnos.fecha, turnos.hora
                    FROM turnos
                    INNER JOIN especialidades ON turnos.id_especialidad = especialidades.id
                    INNER JOIN medico ON turnos.id_medico = medico.id
                    INNER JOIN users ON turnos.id_persona = users.id
                    WHERE turnos.fecha BETWEEN '$date' AND '$fecha_3meses'
                    AND turnos.libre = 0 
                    ".$orderby));
                    
                    break;
                case 5:

                    // $limit = " LIMIT 2000";        
                    $orderby = " ORDER BY turnos.id DESC ";
            
                    $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
                    $date = $fecha_actual->format('Y-m-d');
                    $hora_actual =  $fecha_actual->format('H:i');
            
                    $fecha_3meses = date("Y-m-d",strtotime($fecha_actual."+ 3 month"));
            
                    $data = DB::select(DB::raw("SELECT turnos.id,  especialidades.nombre as especialidad, CONCAT(medico.nombre, ' ', medico.apellido) as medico, users.nombreyApellido as persona, turnos.fecha, turnos.hora
                    FROM turnos
                    INNER JOIN especialidades ON turnos.id_especialidad = especialidades.id
                    INNER JOIN medico ON turnos.id_medico = medico.id
                    INNER JOIN users ON turnos.id_persona = users.id
                    WHERE turnos.fecha >= '$date'
                    AND users.dni = $request->dni
                    ".$orderby));

                    break;
            }

            return json_encode($data, JSON_UNESCAPED_UNICODE);

        }
    }

    public function addBanners(Request $request)
    {
    
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

    public function prueba(Type $var = null)
    {
        $data = ImagenesDePortada::all();

        // dd($banners);

        return json_encode($data, JSON_UNESCAPED_UNICODE);  
    }
}