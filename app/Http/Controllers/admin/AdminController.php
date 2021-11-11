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
        return view('inicio.inicio', compact('banners'));
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
            $imagenexiste = imagenesDePortada::where('imagen', '=',  $original_name)->get();
            
            if ($imagenexiste->count() == 0){

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->save($originalPath.$originalImage->getClientOriginalName());
    
                $imagen   = new imagenesDePortada;
                $imagen->titulo= $titulo_imagen;
                $imagen->imagen = $original_name;
                $imagen->tipo = $tipo_imagen;
                $imagen->descripcion = $descripcion;
                // $imagen->imagen = "imagen";
                $imagen->save(); 
            }

        }elseif ($opcion == 2) {

            $id = $request->id;
            $imagenexiste = imagenesDePortada::where('id', '=',  $id)->get();
            // dd($imagenexiste[0]->imagen);
            $originalPathDelete = public_path().'/images/' . $imagenexiste[0]->tipo . "/";
            $originalPathAdd = public_path().'/images/' . $tipo_imagen . "/";

            if ($imagenexiste->count() != 0){
                $image_path = $originalPathDelete . $imagenexiste[0]->imagen;
                unlink($image_path);

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->save($originalPathAdd.$originalImage->getClientOriginalName());

                DB::table('imagenesDePortada')->where('id',$id)->update(['titulo' => $titulo_imagen, 'imagen' => $original_name, 'tipo' => $tipo_imagen, 'descripcion' => $descripcion]);
                
            }
           
           
        }

                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesDePortada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesDePortada.id, imagenesDePortada.titulo, imagenesDePortada.imagen, imagenesDePortada.tipo, imagenesDePortada.descripcion, imagenesDePortada.created_at, imagenesDePortada.updated_at
                    FROM imagenesDePortada
                        ".$orderby." ".$limit));
        
        return json_encode($data, JSON_UNESCAPED_UNICODE);

        // return response()->json(["code"=>1, "msg"=>"muy bien"]);
        
    }
    public function imageneseliminareditar(Request $request)
    {

        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);       
            
        if($result == "OK"){
            
            //$opcion = $request->opcion;
	    $opcion =$request->input('opcion');

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
                    $imagenexiste = ImagenesDePortada::where('id', '=',  $id)->get();
                    $originalPathDelete = public_path().'/images/' . $imagenexiste[0]->tipo . "/";
                    $image_path = $originalPathDelete . $imagenexiste[0]->imagen;
                    unlink($image_path);


                    $imagen = ImagenesDePortada::get_registro($id);
                    $imagen->delete($id);   


                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesDePortada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesDePortada.id, imagenesDePortada.titulo, imagenesDePortada.imagen, imagenesDePortada.tipo, imagenesDePortada.descripcion, imagenesDePortada.created_at, imagenesDePortada.updated_at
                    FROM imagenesDePortada
                        ".$orderby." ".$limit));
                    break;

                case 4: 
                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY imagenesDePortada.id DESC ";
            
                    $data = DB::select(DB::raw("SELECT imagenesDePortada.id, imagenesDePortada.titulo, imagenesDePortada.imagen, imagenesDePortada.tipo, imagenesDePortada.descripcion, imagenesDePortada.created_at, imagenesDePortada.updated_at
                    FROM imagenesDePortada
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

        $fecha_desde = date("Y-m-d", strtotime($request->fecha_desde));
        $fecha_hasta = date("Y-m-d", strtotime($request->fecha_hasta));
        $lapzo_tiempo = 15;
        // dd($dia_actual);

        $medicos =  DB::select("SELECT * FROM medico");
        $medico_seleccionado = $request->select_medico;
        $array_numeric_keys = array();

        if ($medico_seleccionado == "todos") {

            foreach ($medicos as $key => $value) {
                    $array_numeric_keys[] = $key+1;
            }
            $existe = DB::select("SELECT * FROM `turnos` WHERE fecha BETWEEN ' $fecha_desde' AND '$fecha_hasta'");
            if (count($existe)) {
                $message = "Existen turnos para la fecha";
                $status_info = true;
                $status_ok = false;

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
            $array_numeric_keys[] = $medico_seleccionado;
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
    }

    function genera_calendario($array_numeric_keys, $fecha_desde_param, $fecha_hasta_param, $lapzo_tiempo_param){

		$feriados =  DB::select("SELECT * FROM tab_feriados WHERE fecha BETWEEN ' $fecha_desde_param' AND '$fecha_hasta_param'");

		$mes_hasta = date("m",strtotime($fecha_hasta_param));
        $dia_desde = date("d",strtotime($fecha_desde_param));
        $dia_hasta = date("d",strtotime($fecha_hasta_param));
        foreach ($array_numeric_keys as $key => $value) {

            $fecha = $fecha_desde_param;
            $mes = date("m",strtotime($fecha));

            while ($fecha <= $fecha_hasta_param)
            {	
                
                $dia_actual = date("N",strtotime($fecha));
                
                $dia_nombre = $this->getDia($dia_actual);
                // dd($dia_nombre);

                $turno_espec_medic =  DB::select("SELECT * FROM turno_espec_medic WHERE id_medico = " . $value . " AND dia = '$dia_nombre'" );
                // dd($turno_espec_medic[0]->horario);

                $es_feriado = array_values(array_filter($feriados, function($obj) use ($fecha)
                {
                    return $obj->fecha == $fecha;
                }));
                
                if (sizeof($es_feriado) == 0){
                    //echo $fecha, PHP_EOL; 

                    // dd($hora_fin);
                    $cant = count($turno_espec_medic);
                    // dd($cant);
                    for ($i=0; $i < $cant; $i++) { 

                        if ($turno_espec_medic[$i]->id_especialidades <> "23" AND $turno_espec_medic[$i]->id_especialidades <> "24") {
                            $Hora = $turno_espec_medic[$i]->horario;
                            // $Hora = "09:30";
                            $hora_integer = intval($Hora);
        
                            $hora_fin_integer = $hora_integer + 3;
                            $hora_fin = substr_replace($Hora, $hora_fin_integer, 0, -3);
                            $while = 1;
    
                            while($Hora <= $hora_fin)
                            {
                                DB::insert("insert into turnos 
                                (id_especialidad, id_medico, id_persona, fecha, hora, nro_turno, libre)
                                values(" . $turno_espec_medic[$i]->id_especialidades . ", " . $turno_espec_medic[$i]->id_medico . ", 0,'".$fecha."','".$Hora."',".$while.",1)"); 
    
                                $Hora = date("H:i", strtotime($Hora)+($lapzo_tiempo_param*60));
                                $while++;
                            }
                        }
                        // else
                        // {
                        //     dd("es 23 o 24");
                        // }

                    }    
                }
                

                $fecha = date('Y-m-d', strtotime($fecha. ' + 1 days'));
                
                $mes = date("m",strtotime($fecha));
                $dia_actual = date("d",strtotime($fecha));
                //echo $mes, PHP_EOL; 
                // dd("termino");
            }
        }
		
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

    public function agregarunturnopersona(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            // return view('admin.agregarturno');
            // $especialidades =  DB::select("SELECT * FROM especialidades");
            $status_info = false;
            $buscar = true;
            $message = "";
            return view('admin.agregarunturnopersona', compact ('status_info', 'buscar', 'message'));
        }

        $message = "Inicie Sesion";
        $status_error = true;
        $status_ok = false;
        $esPasc = false;
        
        return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
    }

    public function agregarunturno(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {

            $personaVector =  DB::select("SELECT * FROM users where dni = " . $request->dni);

            if(count($personaVector) == 0)
            {
                $message = "La persona con DNI: " . $request->dni . ", no existe en el sistema";
                $status_info = true;
                $buscar = false;
                $esPasc = false;
                return view('admin.agregarunturnopersona', compact ('status_info', 'buscar', 'message'));
                // return redirect('admin/agregarunturnopersona')->with(['status_info' => $status_info, 'message' => $message, 'buscar' => $buscar,]);
            }
            $persona = $personaVector[0];
            $especialidades =  DB::select("SELECT * FROM especialidades");
            return view('admin.agregarunturno', compact('especialidades', 'persona'));
        }

        $message = "Inicie Sesion";
        $status_error = true;
        $status_ok = false;
        $esPasc = false;
        
        return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
    }

    public function registrarPaciente(Request $request)
    {

        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $email = $request->email;
        $telefono = $request->telefono;
        $dni = $request->dni;
        $passhash = password_hash($dni, PASSWORD_DEFAULT);
        
        DB::insert("insert into users 
							(nombreyApellido, email, telefono, dni, contrasena)
							values('". $nombre . " " . $apellido ."', '". $email ."', " . $telefono . ", '" . $dni."', '" . $passhash ."')");

                            $message = "Cuentra creada con exito";
                            $status_info = true;
                            $status_ok = false;
                            $buscar = true;
        return view('admin.agregarunturnopersona', compact ('status_info', 'buscar', 'message'));                   

    }
    
    public function agregarunturnoPost(Request $request)
    {
        $id_especialidad = $request->select_especialidad;
        $id_medico = $request->select_medico;
        $fecha = $request->fecha_turno;
		$id_turno = $request->select_hora;
        $id_persona = $request->personaID;

		// $turno   = turno::get_registro($request->select_turno);
        $turno  = Turnos::get_registro($id_turno);
        // dd($turno);
        $persona  = Users::get_registroID($id_persona);
        // dd($persona);
        $medico  = Medico::get_registro($id_medico);
        $especialidad  = Especialidades::get_registro($id_especialidad);

		$comprobante = 0;
		$dni = $persona->dni;
		$hora = $turno->hora;
		$fecha = $turno->fecha;
        // dd($fecha);

		$fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
		$date123 = $fecha_actual->format('Y-m-d H:i:s');

		if($turno->libre == 1){
			// dd($turno->libre);
			DB::beginTransaction();
			try{

				$turno->libre = 0;
                $turno->id_persona = $persona->id;
				  
                $comprobante = new Comprobante;
				$comprobante->id_turno = $turno->id;
                $comprobante->id_persona = $persona->id;;
                $comprobante->fecha_cancela = NULL;
				
                if ($comprobante->save()) {
                    # code...
                    $comprobante_id = $comprobante->id;
                }
                $turno->id_comprobante = $comprobante_id;
				$turno->save();

				$precio = 0; 
				
				DB::commit();
                // dd("termino");
				$error = "0";

				$message = "El turno se registro con ÉXITO";
				$status = true;
				$esEmp = false;
                $especialidad_nombre = $especialidad->nombre;
                $medico_nombre = $medico->apellido . " " . $medico->nombre;
                $usuario =  $persona;
				return view('admin.comprobanteTurno', compact('comprobante_id', 'dni', 'status', 'message','hora','fecha', 'esEmp', 'especialidad_nombre','medico_nombre', 'usuario' ));
			}

			catch (\Exception $e)
			{
				DB::rollBack();
				$error = "3";
				$descError = "Error al grabar ".$e;
				throw $e;
				$miArray = array("error"=>$error, "recaptchaValido"=>$recaptchaValido, "descError"=>$descError, "comprobante"=>$comprobante, "id_turno"=>$id_turno, "dni"=>$dni);

				//return ($miArray);
			}        
			
		}
		else{
			// $message = "El turno se ha ocupado mientras ingresaba los datos, INTENTE NUEVAMENTE";
			// $status_error = true;
			// $inicio = "";    
			// $tarmites =  DB::select("SELECT tab_tramites.* FROM tab_tramites where desabilitar = 0 ORDER BY tab_tramites.tramite ASC");
			// $esEmp = false;

			// return view('nuevoTurno.nuevoturno', compact('inicio', 'tarmites', 'message', 'status_error', 'esEmp'));
            dd("error");
		}
    }
    public function imprimir_comprobante($id, $nrodoc, Request $request){

        $usuario = $request->session()->get('usuario');
        // dd($usuario);
        $result = $this->isUsuario($usuario);
        // dd($result);
        if($result == "OK")
        {
            $turno =  DB::select('SELECT turnos.id, turnos.id_comprobante, DATE_FORMAT( turnos.fecha,"%d/%m/%Y") AS fecha, turnos.hora, turnos.nro_turno, FORMAT(users.dni, 0, "de_DE") AS nro_doc, users.nombreyApellido as nombrecompleto, users.telefono, users.email, DATE_FORMAT(turnos.updated_at, "%d/%m/%Y %H:%M:%S") as fecha_emision, especialidades.nombre as especialidad, medico.nombre as medico_nombre, medico.apellido as medico_apellido
            FROM turnos
            INNER JOIN comprobantes ON turnos.id = comprobantes.id_turno
            INNER JOIN users ON users.id = turnos.id_persona
            INNER JOIN especialidades ON turnos.id_especialidad = especialidades.id
            INNER JOIN medico ON turnos.id_medico = medico.id
            WHERE turnos.id_comprobante = '.$id);
            if ($turno){
                
                $date = date('Y-m-d');
    
                // $domicilio = $this->cargadom($turno[0]->domicilio_calle, $turno[0]->domicilio_nro, $turno[0]->domicilio_subnro, $turno[0]->domicilio_piso, $turno[0]->domicilio_dpto, $turno[0]->domicilio_mzna);
    
                $xmail = $turno[0]->email;
                $xid = $id;
                $xndoc = $turno[0]->nro_doc;
    
    
                $pdf = PDF::loadView('portaldelpaciente.comprobante', compact('turno', 'date'));
    
                return $pdf->download('comprobanteTurno.pdf');
            }
        }
        $inicio = "";    
        $status_error = false;
        $esPasc = false;
        $message = "Inicie Sesion";
        // return view('portaldelpaciente.index', compact('inicio','status_error', 'esPasc'));
        return redirect('portaldelpaciente')->with(['status_error' => $status_error, 'message' => $message,]);

    }
    public function getMedicos(Request $request)
    {
        $select_especialidad = $request->select_especialidad;
        $especialidad = DB::select("SELECT * FROM especialidades WHERE id = " .$select_especialidad);
        
        $medicos = DB::select("SELECT * FROM turno_espec_medic WHERE id_especialidades = " .$select_especialidad);

        $where_medico = "WHERE id = " . $medicos[0]->id_medico;
        // dd($where_medico);
        for ($i=1; $i < count($medicos); $i++) { 
            $where_medico = $where_medico . " OR id = " . $medicos[$i]->id_medico;
        }
        
        $data = DB::select("SELECT DISTINCT * FROM medico " . $where_medico);

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function getFechasDisponible(Request $request)
    {
        // $select_especialidad = $request->select_especialidad;
        // $select_medico = $request->select_medico;
        $id_especialidad = $request->select_especialidad;
	    $id_medico =  $request->select_medico;


        $turnos =  DB::select("SELECT turnos.* FROM turnos where id_especialidad = " . $id_especialidad . " AND id_medico = " . $id_medico . " ORDER BY turnos.fecha DESC LIMIT 1 ");
		if(count($turnos) == 0)
		{
			$message = "Por el momento no hay turnos disponibles";
			$status_error = true;
            $especialidad = DB::select("SELECT * FROM especialidades");
            $status_error = true;
            $status_ok = false;
            $esEmp = false;
            
            return redirect('portaldelpaciente/nuevoturno')->with(['status_info' => $status_error, 'message' => $message, 'especialidad' => $especialidad]);
		}

        $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
		$dateactual = $fecha_actual->format('Y/m/d');
		$datefinal = $turnos[0]->fecha;
		$timestamp = strtotime($datefinal);
		$datefinal = date('Y/m/d', $timestamp);

		$diasDisponible =  DB::select("SELECT DISTINCT fecha FROM turnos WHERE libre = 1 AND id_especialidad = " . $id_especialidad . " AND id_medico = " . $id_medico . " AND fecha BETWEEN '" . $dateactual . "' AND '" . $datefinal . "' ORDER BY fecha ASC");
	
        if(count($diasDisponible) == 0)
		{
			
			$message = "Por el momento no hay turnos disponibles";
			$status_error = true;
			// $tarmites =  DB::select("SELECT tab_tramites.* FROM tab_tramites where desabilitar = 0 ORDER BY tab_tramites.tramite ASC");
            $especialidad = DB::select("SELECT * FROM especialidades");
            $status_error = true;
            $status_ok = false;
            $esEmp = false;
            
            return redirect('portaldelpaciente/nuevoturno')->with(['status_info' => $status_error, 'message' => $message, 'especialidad' => $especialidad]);
		}
        $fechasDisp = [];
		foreach ($diasDisponible as $key => $fecha) {
			$fechastr = strtotime($fecha->fecha);
			//Le das el formato que necesitas a la fecha
			$fecha = date('d/m/Y',$fechastr);
			array_push($fechasDisp,$fecha);
		}
        $data = $fechasDisp;

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function getHorasDisponible(Request $request)
    {
         $id_especialidad = $request->select_especialidad;
         $id_medico = $request->select_medico;
         $fechaParam = $request->fechaParam;

          //formato de la fecha  30/06/2021
 
          $diaparam = substr($fechaParam, 0, 2);
         //  dd($diaparam);
          $mesparam = substr($fechaParam, -7, 2);
         //  dd($mesparam);
          $anioparam = substr($fechaParam, -4, 4);
         //  dd($anioparam);
 
          $fecha = $anioparam . "/" . $mesparam . "/" . $diaparam;
         // dd($fecha);
 
         $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
         $date = $fecha_actual->format('Y/m/d');
         $hora_actual =  $fecha_actual->format('H:i');
 
         $whereAmpliacion = "";


         if(strcmp($fecha,$date) == 0){
 
             $whereAmpliacion = "AND hora >'" . $hora_actual."'";
             // dd($whereAmpliacion);
         }
 
         $turnos =  DB::select("SELECT * FROM turnos WHERE id_especialidad = ".$id_especialidad . " AND id_medico = " . $id_medico ." AND libre = 1 AND fecha = '".$fecha."' ".$whereAmpliacion);

         $content= compact('turnos');
         $error = "0";
 
         if(count($turnos) == 0)
         {
             $message = "NO HAY TURNOS PARA LA FECHA: " . $fechaParam;
             $status_error = true;
             // $tarmites =  DB::select("SELECT tab_tramites.* FROM tab_tramites where desabilitar = 0 ORDER BY tab_tramites.tramite ASC");
             $especialidad = DB::select("SELECT * FROM especialidades");
             $status_error = true;
             $status_ok = false;
             $esEmp = false;
             
             return redirect('portaldelpaciente/nuevoturno')->with(['status_info' => $status_error, 'message' => $message, 'especialidad' => $especialidad]);
             
         }

         $data = $turnos;
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function cancelarturnos(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            // return view('admin.agregarturno');
            $medicos =  DB::select("SELECT * FROM medico");
            return view('admin.cancelarturnos', compact('medicos'));
        }

        $message = "Inicie Sesion";
        $status_error = true;
        $status_ok = false;
        $esPasc = false;
        
        return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
    }

    public function cancelarturnospost(Request $request)
    {
        $fecha_desde = date("Y-m-d", strtotime($request->fecha_desde));
        $fecha_hasta = date("Y-m-d", strtotime($request->fecha_hasta));
        $lapzo_tiempo = 15;
        // dd($dia_actual);

        $medicos =  DB::select("SELECT * FROM medico");
        $medico_seleccionado = $request->select_medico;
        $array_numeric_keys = array();


        if ($medico_seleccionado == "todos") 
        {

            foreach ($medicos as $key => $value) {
                $id_medico = $key+1;
                $existe = DB::select("SELECT * FROM `turnos` WHERE fecha BETWEEN ' $fecha_desde' AND '$fecha_hasta' AND id_medico = ". $id_medico);

                if (count($existe) <> 0) {

                    foreach ($existe as $key => $turno) {
                        $turnos = Turnos::get_registro($turno->id);
                        $turnos->delete($turno->id);
                    }
                }
            }
        }
        else
        {
            $existe = DB::select("SELECT * FROM `turnos` WHERE fecha BETWEEN ' $fecha_desde' AND '$fecha_hasta' AND id_medico = ". $medico_seleccionado);
            if (count($existe) <> 0) {

                foreach ($existe as $key => $turno) {
                    $turnos = Turnos::get_registro($turno->id);
                    $turnos->delete($turno->id);
                }
            }
        }

        $message = "Turnos eliminados";
        $status_ok = true;
        $esPasc = false;

        return redirect('admin/cancelarturnos')->with(['status_ok' => $status_ok, 'message' => $message,]);
    }
    public function tablaturnos(Request $request)
    {

        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);       
            
        if($result == "OK"){
            
            if ($request->opcion == NULL) {
                $opcion = $request->opcion_buscar;
            } else {
                $opcion = $request->opcion;
            }
            
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
        

        if($usuario == null)
        {
            return "NO OK";
        }
        $login =  DB::select("SELECT * FROM users where email = '" . $usuario . "' AND admin = 1" );

        if(count($login) == 0)
		{
            $inicio = "";    
            $status_error = true;
            $esPasc = false;
            $message = "Usuario/Contraseña Incorrecta ";
            // return view('portaldelpaciente.index', compact('inicio','status_error', 'esPasc'));
            return redirect('admin')->with(['status_info' => $status_error, 'message' => $message,]);
		}

        return "OK";

    }

    public function prueba(Type $var = null)
    {
        $id_especialidad = 1;
	    $id_medico =  1;
        $fechaParam = "11/11/2021";

        $id_especialidad = $request->id_especialidad;
        $id_medico = $request->id_medico;
        $fecha = $request->fecha;
		$id_turno = $request->select_hora;
        $id_persona = $request->personaID;

		// $turno   = turno::get_registro($request->select_turno);
        $turno  = Turnos::get_registro($id_turno);
        // dd($turno);
        $persona  = Users::get_registroID($id_persona);
        // dd($persona);
        $medico  = Medico::get_registro($id_medico);
        $especialidad  = Especialidades::get_registro($id_especialidad);

		$comprobante = 0;
		$dni = $persona->dni;
		$hora = $turno->hora;
         return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}