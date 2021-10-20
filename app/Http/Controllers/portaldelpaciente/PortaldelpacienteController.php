<?php

namespace App\Http\Controllers\Portaldelpaciente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use URL;
use Redirect; 

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
            return view('portaldelpaciente.iniciarsesion', compact('inicio', 'message', 'status_ok', 'esPaciente', 'usuario'));

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
                $nombre = $login[0]->nombreyApellido;
                // $datos =  DB::select("SELECT DISTINCT apellido, tipo, nombre, cuil, mes, mes_nom, anio FROM recibos_originales where cuil = " . $usuario . " OR numero_documento = '" . $usuario . "'" . " ORDER BY anio, mes ASC");
                // $datos =  DB::select("SELECT DISTINCT apellido, tipo, nombre, cuil, mes, mes_nom, anio FROM recibos_originales where cuil = " . $usuario . " OR numero_documento = '" . $usuario . "'" . " ORDER BY anio, mes ASC");
                
                // if(count( $datos) == 0)
                // {
                //     $no_hay_datos = true;
                // }
                return view('portaldelpaciente.usuario', compact('inicio', 'esPasc', 'nombre', 'email',  'status_ok', 'message'));
                
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
            // dd($especialidades);
            return view('portaldelpaciente.nuevoTurno', compact('inicio', 'message', 'status_ok', 'esPaciente', 'usuario', 'especialidades'));

        }
	    $inicio = "";    
		$status_error = false;
        $esPaciente = false;
    	return view('portaldelpaciente.iniciarsesion', compact('inicio','status_error', 'esPaciente'));
        
    }
    
    public function nuevoturnomedico(Request $request)
    {
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

        return view('portaldelpaciente.nuevoTurno_medico', compact('medicos', 'status_error'));
    }


    public function nuevoturnohorario(Request $request)
    {
        dd($request);
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
