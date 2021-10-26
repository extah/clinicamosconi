@extends('template/template')

@section('css')

<link rel="stylesheet" href="{{ asset('css/barrapasoYcirculo.css') }}">
<link href="{{ asset('/assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>

<style type="text/css">
 /* .btn_personalizado{
  text-decoration: none;
  padding: 10px;
  font-weight: 600;
  font-size: 20px;
  color: #ffffff;
  background-color: #1883ba;
  border-radius: 6px;
  border: 1px solid #0016b0;
} */
.formItem{
  display: block;
  text-align: center;
  line-height: 150%;
}

</style>
@endsection

@section('content')
<article class="">
    <div class="p-0 mb-3">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #04205f;">
          <div class="container-fluid">
            <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">SELECCIONAR FECHA</h5>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-1" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-1">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold fs-5">
                  <div class="dropdown"> 
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ (($usuario->nombreyApellido)) ?? '' }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" style="background-color: #dc3545;" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="{{route('portaldelpaciente.index')}}">Menu</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('portaldelpaciente.miperfilGet')}}">Mi Perfil</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('portaldelpaciente.nuevoturno')}}">Sacar Turno</a></li>
                      <li><a class="dropdown-item" href="{{route('portaldelpaciente.misturnos')}}">Mis Turnos</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{route('portaldelpaciente.cerrarsesion')}}">Cerrar sesion</a></li>
                    </ul>
                  </div>
              </ul>
            </div>
          </div>
        </nav>
      </div>
</article>
<div class="container">

		<div class="col-8 col-sm-6 col-md-6 mx-auto">
            <div class="card text-black bg-info mb-3" style="max-width: 100rem;">
                <div class="card-body text-Black text-center">
                  <h4 class="card-title">Buscar turnos por Fecha</h4>
                </div>                  
            </div>
        </div>
		<div class="form-group">
            <div class="my-2 pb-1 barrapaso-uno" id="barra1"></div>    
        </div>
		<article class="container col-12 mx-auto p-0">
    		<div class="col-11 col-sm-11 col-md-4 col-lg-4 d-flex flex-column mx-auto p-0 my-4">
                <form id="demoForm" method="post" action="{{ url('portaldelpaciente/nuevoturno/horario')  }}" data-toggle="validator" role="form">
                    {{ csrf_field() }}
        
					<div class="form-group">
                        <label class="formItem" for="nombre_especialidad"> <b>Especialidad</b></label>
                        <input  class="form-control text-center" type="text" name="nombre_especialidad" id="nombre_especialidad" value="{{ $especialidadDato->nombre}}" disabled>
					</div>
					<input id="id_especialidad" name="id_especialidad" type="hidden" value="{{ $especialidadDato->id}}">

                    <div class="form-group">
                        <label class="formItem" for="nombre_medico"> <b>Medico</b></label>
                        <input  class="form-control text-center" type="text" name="nombre_medico" id="nombre_medico" value="{{ $medicoDato->nombre}}" disabled>
					</div>
					<input id="id_medico" name="id_medico" type="hidden" value="{{ $medicoDato->id}}">
        
                    <div class="form-group">
                        <label class="formItem" for="fecha_turno"> <b>Fecha</b></label>
                        <input class="form-control text-center" data-date-format="dd/mm/yyyy" id="fecha_turno" name="fecha_turno" required>
                    </div>

                    <label>&nbsp;</label>
        
                    <div class="row d-flex justify-content-center">
                        <input type="submit" class='btn btn-primary btn-lg' value="Siguiente">
                    </div>
                </form>
            </div>	
        </article>
</div>
@endsection

@section('js')

<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<script src='{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}'></script>
<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src="{{ asset('assets/select2/select2.full.js') }}"></script>
<script src='{{ asset("assets/toastr/toastr.min.js") }}'></script>
<script src='{{ asset("assets/sweetalert/sweet-alert.min.js") }}'></script>

<script>
    @if (Session::get('status_info'))
            toastr.info( '{{ session('message') }}', 'Informar', {
                // "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-bottom-right",
                "timeOut": "10000",
            });   
    @endif 
</script>
<script>
	jQuery(function(){
    
    // var enableDays = ["08/06/2021","09/06/2021","10/06/2021","12/06/2021"];
    var enableDays =  {!! json_encode($fechasDisp) !!};
    function enableAllTheseDays(date) {
        var sdate = $.datepicker.formatDate( 'dd/mm/yy', date)
        console.log(sdate)
        if($.inArray(sdate, enableDays) != -1) {
            return [true];
        }
        return [false];
    }

	function sumarDias(fecha){
		fecha.setDate(fecha.getDate());
		return fecha;
	}
    
    $('#fecha_turno').datepicker(
		{
			dateFormat: 'dd/mm/yy', 
			weekStart: 1,
			// daysOfWeekHighlighted: "6,0",
			// autoclose: true,
			todayHighlight: true,
			// setDate : new Date(),
			// startDate: new Date(),
			beforeShowDay: enableAllTheseDays,
			// startDate: sumarDias(new Date()),

		});

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '<Ant',
			nextText: 'Sig>',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};

		$.datepicker.setDefaults($.datepicker.regional['es']);
		// $('#fecha_turno').datepicker("setDate", new Date()); //dia actual
        $('#fecha_turno').datepicker("setDate", {!! json_encode($fechasDisp[0]) !!});
		

});



</script>
@endsection