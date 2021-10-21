@extends('template/template')

@section('css')

<link rel="stylesheet" href="{{ asset('css/barrapasoYcirculo.css') }}">
{{-- <link href="{{ asset('/assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/> --}}
<link href="{{ asset('/assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>

{{-- <link href="{{ asset('/css/datepickk.min.css') }}" rel="stylesheet"> --}}

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
    		<div class="col-11 col-sm-11 col-md-6 col-lg-6 d-flex flex-column mx-auto p-0 my-4">
                <form id="demoForm" method="post" action="{{ url('portaldelpaciente/turnoconfirmado')  }}" data-toggle="validator" role="form">
                    {{ csrf_field() }}
        
					<div class="form-group">
                        <label class="formItem" for="nombre_especialidad"> <b>Especialidad</b></label>
                        <input  class="form-control" type="text" name="nombre_especialidad" id="nombre_especialidad" value="{{ $especialidadDato->nombre}}" disabled>
					</div>
					<input id="id_especialidad" name="id_especialidad" type="hidden" value="{{ $especialidadDato->id}}">

                    <div class="form-group">
                        <label class="formItem" for="nombre_medico"> <b>Medico</b></label>
                        <input  class="form-control" type="text" name="nombre_medico" id="nombre_medico" value="{{ $medicoDato->nombre}}" disabled>
					</div>
					<input id="id_medico" name="id_medico" type="hidden" value="{{ $medicoDato->id}}">
        
                    <div class="form-group">
                        <label class="formItem" for="fecha_param"> <b>Fecha</b></label>
                        <input  class="form-control" type="text" name="fecha_param" id="fecha_param" value="{{ $fechaParam}}" disabled>
					</div>
					<input id="fecha" name="fecha" type="hidden" value="{{ $fechaParam }}">

                    <div class="form-group">
                        <label class="formItem" for="select_turno"> <b>Horario disponible</b></label>
                        <select name="select_turno" id="select_turno" class="form-control" required>
                            @foreach($turnos as $turno)
                                <option value="{{ $turno->id }}" offset="1">{{ $turno->hora }}</option>        
                            @endforeach
                        </select>
                    </div>

                    <label>&nbsp;</label>
        
                    <div class="row d-flex justify-content-center">
                        <input type="submit" class='btn btn-primary btn-lg' value="Confirmar turno">
                    </div>
                </form>
            </div>	
        </article>
</div>
@endsection

@section('js')

<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
{{-- <script src="{{ asset('/assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js') }}"></script> --}}
<script src='{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}'></script>
{{-- <script src="{{ asset('/assets/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js') }}"></script> --}}
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

@endsection