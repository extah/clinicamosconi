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

// Ruta de sección 'Especialidades'
// Route::get('/especialidades', 'Especialidades\SpecialtiesController@specialties');
Route::group(array('prefix' => 'especialidades'), function(){
	Route::get('/',	'Especialidades\EspecialidadesController@index')->name('especialidades.index');
	Route::post('/turnosasignadosdatatable',	'Especialidades\EspecialidadesController@turnosasignadosdatatable')->name('especialidades.turnosasignadosdatatable');

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