<?php

namespace App\Http\Controllers\Portaldelpaciente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use URL;
use Redirect; 
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

use App\Users;
use App\Turnos;
use App\Medico;
use App\Comprobante;
use App\Especialidades;

class PortaldelpacienteController extends Controller
{
    //
    public function index(Request $request){
        // dd("hola");
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);
        // dd($result);
        if($result == "OK")
        {
            $inicio ="";
            $status_ok = false;
            $esPaciente = true;
            $message = "";
            $usuario =  Users::get_registro($usuario);
            return view('portaldelpaciente.usuario', compact('inicio', 'message', 'status_ok', 'usuario', 'usuario'));

        }
	    $inicio = "";    
		$status_error = false;
        $esPaciente = false;
    	return view('portaldelpaciente.iniciarsesion', compact('inicio','status_error', 'esPaciente'));
    }

    public function iniciarsesion(Request $request){
        $inicio = "";
        $email = $request->email;
        $contrasena = $request->password;
        // dd($usuario . ' ' . $contrasena);
        $status_info = true;

        $login =  DB::select("SELECT * FROM users where email = '" . $email . "'" );
        if(count($login) == 0)
		{
            
            $inicio = "";    
            $status_error = false;
            $esPasc = false;
            $message = "usuario/contraseña ";
            // return view('portaldelpaciente.index', compact('inicio','status_error', 'esPasc'));
            return redirect('portaldelpaciente')->with(['status_error' => $status_error, 'message' => $message,]);
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
                // $nombre = $login[0]->nombreyApellido;
                // $datos =  DB::select("SELECT DISTINCT apellido, tipo, nombre, cuil, mes, mes_nom, anio FROM recibos_originales where cuil = " . $usuario . " OR numero_documento = '" . $usuario . "'" . " ORDER BY anio, mes ASC");
                // $datos =  DB::select("SELECT DISTINCT apellido, tipo, nombre, cuil, mes, mes_nom, anio FROM recibos_originales where cuil = " . $usuario . " OR numero_documento = '" . $usuario . "'" . " ORDER BY anio, mes ASC");
                
                // if(count( $datos) == 0)
                // {
                //     $no_hay_datos = true;
                // }
                $usuario =  Users::get_registro($login[0]->email);
                return view('portaldelpaciente.usuario', compact('inicio', 'esPasc', 'usuario', 'email',  'status_ok', 'message'));
                
            }
            else
            {
                $message = "usuario/contraseña ";
                $status_error = true;
                $status_ok = false;
                $esPasc = false;
                
                // return view('portaldelpaciente.index', compact('inicio', 'message', 'status_error', 'esPasc'));
                return redirect('portaldelpaciente')->with(['status_error' => $status_error, 'message' => $message,]);
                
            }
        }
    }

    public function iniciarsesionGet(Request $request){
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            $inicio ="";
            $status_ok = false;
            $esPaciente = true;
            $message = "";
            return view('portaldelpaciente.usuario', compact('inicio', 'message', 'status_ok', 'esPaciente', 'usuario'));

        }
	    $inicio = "";    
		$status_error = false;
        $esPaciente = false;
    	return view('portaldelpaciente.iniciarsesion', compact('inicio','status_error', 'esPaciente'));
    }

    public function registrarse(Request $request)
    {
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $email = $request->email;
        $dni = $request->dni;
        $telefono = $request->telefono;
        $contrasena = $request->password;
        $confirmpassword = $request->confirmpassword;
        // dd($nombre . $apellido . $email . $dni . $telefono. " " . $contrasena . " " .$confirmpassword);
        if($nombre == null || $apellido == null || $email == null || $dni  == null || $contrasena == null || $confirmpassword  == null)
        {
			$message = "Para Registrarse, complete todos los datos del formulario";
			$status_error = false;
            $status_info = true;
            $esPasc = false;
            // dd("vacio");
			return view('portaldelpaciente.iniciarsesion', compact('message', 'status_error', 'status_info', 'esPasc'));
            // return redirect('inicio')->with(['status_info' => $status_error, 'message' => $message,]);
        }

        $existe =  DB::select("SELECT * FROM users where email = '" . $email . "'" );
        // dd($existe);
        if(count($existe) >= 1)
		{
			$message = "Usted ya posee una cuenta";
			$status_error = false;
            $status_info = true;
            $esEmp = false;
            // $dd("Usted ya posee una cuenta");
			
            return redirect('portaldelpaciente')->with(['status_info' => $status_info, 'message' => $message,]);
		}
        else {
            if ($contrasena == $confirmpassword) {
                $passhash = password_hash($contrasena, PASSWORD_DEFAULT);
                DB::insert("insert into users 
							(nombreyApellido, email, telefono, dni, contrasena)
							values('". $nombre . " " . $apellido ."', '". $email ."', " . $telefono . ", '" . $dni."', '" . $passhash ."')");

                            $message = "Cuentra creada con exito";
                            $status_error = true;
                            $status_ok = false;
                            $esEmp = false;
                            // dd("entro");
                            return redirect('portaldelpaciente')->with(['status_info' => $status_error, 'message' => $message,]);
            }
            else {
                // dd("no es igual");
                $message = "No coinciden las contraseñas";
                $status_error = true;
                $status_ok = false;
                $esEmp = false;
                
                return redirect('portaldelpaciente')->with(['status_info' => $status_error, 'message' => $message,]);
            }
        }
    }

    public function miperfilGet(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            $usuario =  Users::get_registro($usuario);
            $inicio ="";
            $status_ok = false;
            $esPaciente = true;
            $message = "";
            return view('portaldelpaciente.miperfil', compact('inicio', 'message', 'status_ok', 'esPaciente', 'usuario'));

        }
	    $inicio = "";    
		$status_error = false;
        $esPaciente = false;
    	return view('portaldelpaciente.iniciarsesion', compact('inicio','status_error', 'esPaciente'));
    }
    public function editardatos(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

        if($result == "OK")
        {
            $usuario =  Users::get_registro($usuario);
            DB::beginTransaction();
            try{

				$usuario->nombreyApellido = $request->nombre_apellido;
                $usuario->email = $request->email;
                $usuario->telefono = $request->telefono;
                $usuario->dni = $request->dni;
                $usuario->fecha_nacimiento = $request->fecha_nac;
				
				$usuario->save();

				$precio = 0; 
				
				DB::commit();
                // dd("termino");

                $inicio ="";
                $message = "Datos Actualizados con Exito";
                $status_info = true;
                $esPaciente = true;
                // return view('portaldelpaciente.miperfil', compact('inicio', 'message', 'status_info', 'esPaciente', 'usuario'));
                return redirect('portaldelpaciente/miperfil')->with(['status_info' => $status_info, 'message' => $message,]);
			}

			catch (\Exception $e)
			{
				DB::rollBack();
				$error = "3";
				$message = "Error al grabar ".$e;
                $status_info = false;
                $esPaciente = true;

                return view('portaldelpaciente.miperfil', compact('inicio', 'message', 'status_info', 'esPaciente', 'usuario'));
			}        



        }
    }
    public function nuevoturno(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        // dd($usuario);
        $result = $this->isUsuario($usuario);
        // dd($result);
        if($result == "OK")
        {
            $inicio ="";
            $status_ok = false;
            $esPaciente = true;
            $message = "";
            $especialidades =  DB::select("SELECT * FROM especialidades");
            $usuario =  Users::get_registro($usuario);
            return view('portaldelpaciente.nuevoTurno', compact('inicio', 'message', 'status_ok', 'esPaciente', 'usuario', 'especialidades'));

        }
	    $inicio = "";    
		$status_error = false;
        $esPaciente = false;
    	return view('portaldelpaciente.iniciarsesion', compact('inicio','status_error', 'esPaciente'));
        
    }
    
    public function nuevoturnomedico(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        $barrios = null;
        $status_error = false;
        $select_especialidad = $request->select_especialidad;
        $especialidad = DB::select("SELECT * FROM especialidades WHERE id = " .$select_especialidad);
        
        $medicos = DB::select("SELECT * FROM turno_espec_medic WHERE id_especialidades = " .$select_especialidad);

        $where_medico = "WHERE id = " . $medicos[0]->id_medico;
        // dd($where_medico);
        for ($i=1; $i < count($medicos); $i++) { 
            $where_medico = $where_medico . " OR id = " . $medicos[$i]->id_medico;
        }
        
        $medicos = DB::select("SELECT DISTINCT * FROM medico " . $where_medico);
        // dd($medicos);
        $especialidadDato = $especialidad[0];
        $usuario =  Users::get_registro($usuario);

        return view('portaldelpaciente.nuevoTurno_medico', compact('medicos', 'status_error', 'especialidadDato', 'usuario'));
    }


    public function nuevoturnofecha(Request $request)
    {
        $inicio = "";  
		$esEmp = false;  
        $usuario = $request->session()->get('usuario');
        // dd($request);
        $id_especialidad = $request->id_especialidad;
	    $id_medico =  $request->select_medico;

		$turnos =  DB::select("SELECT turnos.* FROM turnos where id_especialidad = " . $id_especialidad . " AND id_medico = " . $id_medico . " ORDER BY turnos.fecha DESC LIMIT 1 ");
        // dd($turnos);
		// chequeo si hay fechas para el barrio	
		
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
		// $barrio_select = DB::select("SELECT barrios.* FROM barrios WHERE id = " . $id_barrio);
		// $nombrebarrio = $barrio_select[0]->barrio;

		$fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
		$dateactual = $fecha_actual->format('Y/m/d');
		$datefinal = $turnos[0]->fecha;
		$timestamp = strtotime($datefinal);
		$datefinal = date('Y/m/d', $timestamp);
		// dd($dateactual . "  " . $datefinal);
		// dd("SELECT DISTINCT fecha FROM turnos WHERE libre = 1 AND id_barrio = " . $id_barrio . " AND fecha BETWEEN '" . $dateactual . "' AND '" . $datefinal . "' ORDER BY fecha ASC");
		// SELECT DISTINCT fecha FROM `turno` WHERE libre = 1 AND id_tramite_turno = 1 AND fecha BETWEEN '2021/06/01' AND '2021/06/30' ORDER BY id_turno ASC
		$diasDisponible =  DB::select("SELECT DISTINCT fecha FROM turnos WHERE libre = 1 AND id_especialidad = " . $id_especialidad . " AND id_medico = " . $id_medico . " AND fecha BETWEEN '" . $dateactual . "' AND '" . $datefinal . "' ORDER BY fecha ASC");
		// dd($diasDisponible);
		
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

		$status_error = false;
		$esEmp = false;
        $especialidadDato = DB::select("SELECT * FROM especialidades WHERE id = " .$id_especialidad);
        $especialidadDato = $especialidadDato[0];
        $medicoDato = DB::select("SELECT * FROM medico WHERE id = " .$id_medico);
        $medicoDato = $medicoDato[0];
        $usuario =  Users::get_registro($usuario);
    	return view('portaldelpaciente.nuevoTurno_fecha', compact('inicio', 'especialidadDato', 'medicoDato', 'fechasDisp', 'status_error', 'esEmp','usuario'));
    }


    public function nuevoturnohorario(Request $request)
    {
        //  dd($request);
         $usuario = $request->session()->get('usuario');
         $id_especialidad = $request->id_especialidad;
         $id_medico = $request->id_medico;
         $fechaParam = $request->fecha_turno;

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
 
             $whereAmpliacion = "and hora >'" . $hora_actual."'";
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

         $esEmp = false;
         $especialidadDato = DB::select("SELECT * FROM especialidades WHERE id = " .$id_especialidad);
         $especialidadDato = $especialidadDato[0];
         $medicoDato = DB::select("SELECT * FROM medico WHERE id = " .$id_medico);
         $medicoDato = $medicoDato[0];
         $usuario =  Users::get_registro($usuario);

         return view('portaldelpaciente.nuevoTurno_horario', compact('turnos', 'especialidadDato', 'medicoDato', 'esEmp', 'fechaParam', 'usuario'));
    }

    public function turnoConfirmado(Request $request){
        // dd($request);
        $usuario = $request->session()->get('usuario');

		$id_especialidad = $request->id_especialidad;
        $id_medico = $request->id_medico;
        $fecha = $request->fecha;
		$id_turno = $request->select_turno;

		// $turno   = turno::get_registro($request->select_turno);
        $turno  = Turnos::get_registro($id_turno);
        // dd($turno);
        $persona  = Users::get_registro($usuario);
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
                $usuario =  Users::get_registro($usuario);
				return view('portaldelpaciente.comprobanteTurno', compact('comprobante_id', 'dni', 'status', 'message','hora','fecha', 'esEmp', 'especialidad_nombre','medico_nombre', 'usuario' ));
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

		// $content= compact('turno');//tranformo a json

		// return $content;
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

    function cargadom(){
        $dom = "";
        if($calle != '')
        {
            $dom .= "calle ".$calle;
        }
        if($nro != '')
        {
            $dom .= " N° ".$nro;
        }
        if($subnro != '')
        {
            $dom .= " ".$subnro;
        }
        if($piso != '')
        {
            $dom .= " piso ".$piso;
        }
        if($dpto != '')
        {
            $dom .= " dpto. ".$dpto;
        }
        if($mzna != '')
        {
            $dom .= " mzna. ".$mzna;
        }

        return $dom;

    }

    public function misturnos(Request $request)
    {
        $usuario = $request->session()->get('usuario');
        // dd($usuario);
        $result = $this->isUsuario($usuario);
        // dd($result);
        if($result == "OK")
        {
            $inicio ="";
            $status_ok = false;
            $esPaciente = true;
            $message = "";
            $usuario =  Users::get_registro($usuario);
            return view('portaldelpaciente.mis_turnos', compact('inicio', 'message', 'status_ok', 'esPaciente', 'usuario',));

        }
	    $inicio = "";    
		$status_error = false;
        $esPaciente = false;
    	return view('portaldelpaciente.iniciarsesion', compact('inicio','status_error', 'esPaciente'));


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
        return redirect('portaldelpaciente');

    }

    public function turnoseliminareditar(Request $request)
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
                        // $miArray = array("error"=>$error, "recaptchaValido"=>$recaptchaValido, "descError"=>$descError, "comprobante"=>$comprobante, "id_turno"=>$id_turno, "dni"=>$dni);
        
                        //return ($miArray);
                    }       

                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY turnos.id DESC ";

                    $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
                    $date = $fecha_actual->format('Y-m-d');
                    $hora_actual =  $fecha_actual->format('H:i');
            
                    $data = DB::select(DB::raw("SELECT turnos.id_comprobante as id_comprobante, especialidades.nombre as especialidad, CONCAT(medico.nombre, ' ', medico.apellido) as medico, turnos.fecha, turnos.hora
                    FROM turnos
                    INNER JOIN especialidades ON turnos.id_especialidad = especialidades.id
                    INNER JOIN medico ON turnos.id_medico = medico.id
                    WHERE turnos.fecha >= '$date'
                    AND turnos.libre = 0
                    ".$orderby." ".$limit));
                    break;

                case 4: 
                    $limit = " LIMIT 500";        
                    $orderby = " ORDER BY turnos.id DESC ";

                    $fecha_actual = Carbon::now('America/Argentina/Buenos_Aires');
                    $date = $fecha_actual->format('Y-m-d');
                    $hora_actual =  $fecha_actual->format('H:i');
            
                    $data = DB::select(DB::raw("SELECT turnos.id_comprobante as id_comprobante, especialidades.nombre as especialidad, CONCAT(medico.nombre, ' ', medico.apellido) as medico, turnos.fecha, turnos.hora
                    FROM turnos
                    INNER JOIN especialidades ON turnos.id_especialidad = especialidades.id
                    INNER JOIN medico ON turnos.id_medico = medico.id
                    WHERE turnos.fecha >= '$date'
                    AND turnos.libre = 0
                    ".$orderby." ".$limit));
                    break;
                
            }

            return json_encode($data, JSON_UNESCAPED_UNICODE);

        }
    }
    public function prueba(Type $var = null)
    {
        $id_comprobante = 5;
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
            // $miArray = array("error"=>$error, "recaptchaValido"=>$recaptchaValido, "descError"=>$descError, "comprobante"=>$comprobante, "id_turno"=>$id_turno, "dni"=>$dni);

            //return ($miArray);
        }   
        dd($turno);
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

    public function usuario() {

        return view('portaldelpaciente.usuario');

    }

}
