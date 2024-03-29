<?php

use App\Http\Middleware\SetDefaultTypeFilterForUrls;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();

// Route::get('/ndo', 'NotificarController@index')
//     ->name('notificar.index');
Route::get('/','Inicio\InicioController@index');

Route::group(array('prefix' => 'inicio'), function(){
		Route::get('/',	'Inicio\InicioController@index')->name('inicio.index');
});

Route::group(array('prefix' => 'proximamente'), function(){
	Route::get('/',	'proximamente\ProximamenteController@index')->name('proximamente.index');
	
});

Route::group(array('prefix' => 'maps'), function(){
	Route::get('/',	'maps\MapsController@index')->name('maps.index');
	Route::get('/farmacias',	'maps\MapsController@farmacias')->name('maps.farmacias');
});

// Admin
Route::group(array('prefix' => 'admin'), function(){
	Route::get('/',	'admin\AdminController@index')->name('admin.index');
	Route::post('/login',	'admin\AdminController@login')->name('admin.login');
	Route::get('/imagenes',	'admin\AdminController@imagenes')->name('admin.imagenes');
	Route::post('/imagenespost',	'admin\AdminController@imagenespost')->name('admin.imagenespost');

	Route::get('/turnos',	'admin\AdminController@turnos')->name('admin.turnos');
	Route::post('/tablaturnos',	'admin\AdminController@tablaturnos')->name('admin.tablaturnos');

	Route::post('/imageneseliminareditar',	'admin\AdminController@imageneseliminareditar')->name('admin.imageneseliminareditar');
	Route::post('/imagenesagregar',	'admin\AdminController@imagenesagregar')->name('admin.imagenesagregar');
	Route::get('/cerrarsesion',	'admin\AdminController@cerrarsesion')->name('admin.cerrarsesion');
	Route::get('/agregarturno',	'admin\AdminController@agregarturno')->name('admin.agregarturno');
	Route::get('/generarturnos',	'admin\AdminController@generarturnos')->name('admin.generarturnos');
	Route::post('/generarturnospost',	'admin\AdminController@generarturnospost')->name('admin.generarturnospost');
	Route::get('/cancelarturnos',	'admin\AdminController@cancelarturnos')->name('admin.cancelarturnos');
	Route::post('/cancelarturnospost',	'admin\AdminController@cancelarturnospost')->name('admin.cancelarturnospost');

	Route::get('/agregarunturnopersona',	'admin\AdminController@agregarunturnopersona')->name('admin.agregarunturnopersona');
	Route::post('/agregarunturno',	'admin\AdminController@agregarunturno')->name('admin.agregarunturno');
	Route::post('/registrarPaciente',	'admin\AdminController@registrarPaciente')->name('admin.registrarPaciente');
	Route::post('/getMedicos',	'admin\AdminController@getMedicos')->name('admin.getMedicos');
	Route::post('/getFechasDisponible',	'admin\AdminController@getFechasDisponible')->name('admin.getFechasDisponible');
	Route::post('/getHorasDisponible',	'admin\AdminController@getHorasDisponible')->name('admin.getHorasDisponible');
	Route::post('/agregarunturnoPost',	'admin\AdminController@agregarunturnoPost')->name('admin.agregarunturnoPost');
	Route::get('descargarcomprobante/{id}/{nrodoc}',  	'admin\AdminController@imprimir_comprobante')->name('admin.imprimir_comprobante');
	Route::get('/prueba',	'admin\AdminController@prueba')->name('admin.prueba');
});


//portal del paciente
Route::group(array('prefix' => 'portaldelpaciente'), function(){
	Route::get('/',	'portaldelpaciente\PortaldelpacienteController@index')->name('portaldelpaciente.index');
	Route::post('/home',	'portaldelpaciente\PortaldelpacienteController@iniciarsesion')->name('portaldelpaciente.iniciarsesion');
	Route::get('/home',	'portaldelpaciente\PortaldelpacienteController@iniciarsesionGet')->name('portaldelpaciente.iniciarsesionGet');
	Route::post('/',	'portaldelpaciente\PortaldelpacienteController@registrarse')->name('portaldelpaciente.registrarse');
	Route::get('/miperfil',	'portaldelpaciente\PortaldelpacienteController@miperfilGet')->name('portaldelpaciente.miperfilGet');
	Route::post('/editardatos',	'portaldelpaciente\PortaldelpacienteController@editardatos')->name('portaldelpaciente.editardatos');
	
	Route::get('/cerrarsesion',	'portaldelpaciente\PortaldelpacienteController@cerrarsesion')->name('portaldelpaciente.cerrarsesion');
	Route::get('/turnos',	'portaldelpaciente\PortaldelpacienteController@misturnos')->name('portaldelpaciente.misturnos');
	Route::get('/nuevoturno', 'portaldelpaciente\PortaldelpacienteController@nuevoturno')->name('portaldelpaciente.nuevoturno');
	Route::post('/nuevoturno/medico',	'portaldelpaciente\PortaldelpacienteController@nuevoturnomedico')->name('portaldelpaciente.nuevoturnomedico');
	Route::post('/nuevoturno/fecha',	'portaldelpaciente\PortaldelpacienteController@nuevoturnofecha')->name('portaldelpaciente.nuevoturnofecha');
	Route::post('/nuevoturno/horario',	'portaldelpaciente\PortaldelpacienteController@nuevoturnohorario')->name('portaldelpaciente.nuevoturnohorario');
	Route::post('/turnoconfirmado',	'portaldelpaciente\PortaldelpacienteController@turnoConfirmado')->name('portaldelpaciente.turnoConfirmado');
	Route::get('descargarcomprobante/{id}/{nrodoc}',  	'portaldelpaciente\PortaldelpacienteController@imprimir_comprobante')->name('portaldelpaciente.imprimir_comprobante');
	Route::post('/turnoseliminareditar',	'portaldelpaciente\PortaldelpacienteController@turnoseliminareditar')->name('portaldelpaciente.turnoseliminareditar');

	Route::get('/prueba',  	'portaldelpaciente\PortaldelpacienteController@prueba')->name('portaldelpaciente.prueba');

});



//turnos web
Route::group(array('prefix' => 'turnos'), function(){
	Route::get('/',	'turnos\TurnosController@index')->name('turnos.index');
});

Route::group(array('prefix' => 'contacto'), function(){
	Route::get('/',	'contacto\ContactoController@index')->name('contacto.index');

});

// Ruta de sección 'Especialidades'
// Route::get('/especialidades', 'Especialidades\SpecialtiesController@specialties');
Route::group(array('prefix' => 'especialidades'), function(){
	Route::get('/',	'Especialidades\EspecialidadesController@index')->name('especialidades.index');
	Route::post('/turnosasignadosdatatable',	'Especialidades\EspecialidadesController@turnosasignadosdatatable')->name('especialidades.turnosasignadosdatatable');

});

// Ruta de sección 'Guardia Pediatrica'
Route::group(array('prefix' => 'guardiaPediatrica'), function(){
	Route::get('/',	'guardiaPediatrica\GuardiaPediatricaController@index')->name('guardiaPediatrica.index');

});

// Ruta de sección 'Guardia Web'
Route::group(array('prefix' => 'guardiaWeb'), function(){
	Route::get('/',	'guardiaWeb\GuardiaWebController@index')->name('guardiaWeb.index');

});

// Ruta de sección 'Laboratorio'
Route::group(array('prefix' => 'laboratorio'), function(){
	Route::get('/',	'Laboratorio\LaboratorioController@index')->name('laboratorio.index');

});

// Ruta de sección 'La Clínica'
Route::group(array('prefix' => 'laclinica'), function(){
	Route::get('/',	'laclinica\LaclinicaController@index')->name('laclinica.index');

});

// Ruta de sección 'Cooperativa'
Route::group(array('prefix' => 'cooperativa'), function(){
	Route::get('/',	'cooperativa\CooperativaController@index')->name('cooperativa.index');

});

// Ruta de sección 'Diagnóstico por Imágenes'
Route::group(array('prefix' => 'diagnostico'), function(){
	Route::get('/',	'diagnostico\DiagnosticoController@index')->name('diagnostico.index');

});

// Ruta de sección 'Galería'
Route::group(array('prefix' => 'galeria'), function(){
	Route::get('/',	'galeria\GaleriaController@index')->name('galeria.index');

});

// Ruta de sección 'Novedades'
Route::group(array('prefix' => 'novedades'), function(){
	Route::get('/',	'novedades\NovedadesController@index')->name('novedades.index');

});

// Route::get('/laboratorio', function(){
// 	return	view('laboratorio.laboratorio');
// });

Route::group(array('prefix' => 'nuevoTurno'), function(){

		// Route::get('/t',	'nuevoTurnom\NuevoTurnoController@index');

		Route::get('/',	'nuevoTurno\NuevoTurnoController@index')->name('nuevoTurno.index');
		Route::post('/',	'nuevoTurno\NuevoTurnoController@index');

		// Route::get('/formdatospersonales/{id_tramite}',		'nuevoTurno\NuevoTurnoController@formdatospersonales');
		// Route::get('/validarDatosPersonales',	'nuevoTurno\NuevoTurnoController@validarDatosPersonales');
		// Route::get('/fechaHasta/{id_tramite}',	'nuevoTurno\NuevoTurnoController@fechaHasta');
		
		Route::get('/disponibles/{id_tramite}/{fecha}',	'nuevoTurno\NuevoTurnoController@disponibles');
		Route::post('/fechasDisponibles',	'nuevoTurno\NuevoTurnoController@fechasIndex');
		Route::post('/turnosDisponibles',	'nuevoTurno\NuevoTurnoController@turnosDisponibles');
		Route::post('/turnoConfirmado',	'nuevoTurno\NuevoTurnoController@turnoConfirmado');
		Route::get('descargar_pdf/{id}/{nrodoc}',  	'boleta\BoletaController@imprimir_pdf');

		Route::get('/save_turno',				'nuevoTurno\NuevoTurnoController@save_turno');


		Route::get('boletapdf/{id}/{nrodoc}',  	'boleta\BoletaController@invoice');
		Route::get('muestrapdf',  				'boleta\BoletaController@muestrapdf');
		Route::get('errorboleta',  	'boleta\BoletaController@errorboleta');

		Route::get('enviamail',  	'Email\EmailController@envia_comprobante');	
		 
		//Route::post('/cancela_turno_save/{nconprobante}/{tipo_doc}/{nrodoc}',	'anulaturno\AnulaTurnoController@cancela_turno_save');

		Route::get('/reimprime_turno','reimprimeTurno\ReimprimeTurnoController@reimprimir_turno');
		Route::get('/reimprime_turno','reimprimeTurno\ReimprimeTurnoController@buscar_turno');

		// Route::get('/prueba',	'nuevoTurno\NuevoTurnoController@indexprueba');

	});

    Route::group(array('prefix' => 'cancelarTurno'), function(){
        Route::get('/','anulaturno\AnulaTurnoController@index')->name('cancelarTurno.cancelar');
        Route::post('/cancelaTurnoBuscar','anulaturno\AnulaTurnoController@buscar_turno_cancelar')->name('cancelarTurno.buscarCancelar');
        // Route::get('/prueba','anulaturno\AnulaTurnoController@emma')->name('cancelarTurno.emma');
        // Route::get('/cancela_turno','anulaturno\AnulaTurnoController@cancela_turno');
        // Route::post('/cancela_turno','anulaturno\AnulaTurnoController@buscar_turno');
    
    });

	Route::group(array('prefix' => 'administrador'), function(){
		Route::get('/',	'administrador\AdministradorController@index')->name('turnosadmin.index');
		Route::post('/menu','administrador\AdministradorController@iniciarsesion')->name('turnosadmin.validaciondatos');
		Route::get('/menu','administrador\AdministradorController@iniciarsesionget')->name('turnosadmin.validaciondatosget');
		// Route::get('/calendario',	'administrador\AdministradorController@calendario')->name('turnosadmin.calendario');
		Route::get('/turnosasignados',	'administrador\AdministradorController@turnosasignados')->name('turnosadmin.turnosasignados');
		Route::get('/generarturnos',	'administrador\AdministradorController@generarturnos')->name('turnosadmin.generarturnos');
		Route::post('/generarturnos',	'administrador\AdministradorController@generarturnospost')->name('turnosadmin.generarturnospost');
		Route::get('/generarferiados',	'administrador\AdministradorController@generarferiados')->name('turnosadmin.generarferiados');
		//json turnos
		Route::post('/turnodatatable',	'administrador\AdministradorController@turnosasignadosdatatable')->name('turnosadmin.turnosasignadosdatatable');
		//json feriados
		Route::get('/feriados',	'administrador\AdministradorController@feriadosdatatable')->name('turnosadmin.feriadosdatatable');
		Route::post('/feriadoseliminareditar',	'administrador\AdministradorController@feriadoseliminareditar')->name('turnosadmin.feriadoseliminareditar');

		Route::get('/cerrarsesion',	'administrador\AdministradorController@cerrarsesion')->name('turnosadmin.cerrarsesion');

		// Route::get('/editar',	'administrador\AdministradorController@editar')->name('turnosadmin.editar');
		// Route::post('/feriadosnuevo',	'administrador\AdministradorController@feriadosnuevo')->name('turnosadmin.feriadosnuevo');
		// Route::get('/feriadosediteliminar',	'administrador\AdministradorController@feriadosediteliminar')->name('turnosadmin.feriadosediteliminar');
		// Route::get('/exportlistado',	'administrador\AdministradorController@exportlistado')->name('turnosadmin.exportlistado');
	});





// BATCH EXCEL-EMMA

// Route::get('/importLotes','PiezaExcelController@importLotes')
//     ->name('piezaExcels.lotes');
// Route::post('/errorLotes', 'PiezaExcelController@errorLotes')
//     ->name('piezaExcels.errorLotes');
// Route::match(['get', 'post'], '/piezasExcel', 'PiezaExcelController@index')
//     ->name('piezaExcels.index');
// BATCH FIN