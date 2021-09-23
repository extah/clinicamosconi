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
        // dd("hola");
        $usuario = $request->session()->get('usuario');
        $result = $this->isUsuario($usuario);

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
