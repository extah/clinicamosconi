@extends('template/template')

@section('css')

<link rel="stylesheet" href="{{ asset('css/barrapasoYcirculo.css') }}">

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

<div class="container col-12 mx-auto p-0">

		<div class="col-8 col-sm-6 col-md-6 mx-auto">
            <div class="card text-black bg-info mb-3" style="max-width: 100rem;">
                <div class="card-body text-Black text-center">
                  <h4 class="card-title">Buscar turnos por Especialidad</h4>
                </div>                  
            </div>
        </div>
		<div class="form-group">
            <div class="my-2 pb-1 barrapaso-uno" id="barra1"></div>    
        </div>
		<article class="container col-12 mx-auto p-0">
    		<div class="col-11 col-sm-11 col-md-6 col-lg-6 d-flex flex-column mx-auto p-0 my-4">
				<form id="demoForm" method="post" action="{{ url('portaldelpaciente/nuevoturno/medico')  }}" data-toggle="validator" role="form">
					{{ csrf_field() }}

					<div class="form-group">
						<label class="formItem" for="select_especialidad"> <b>Especialidad</b></label>
						<select name="select_especialidad" id="select_especialidad" class="form-control" required>
							<option value="">-Seleccioná una Especialidad-</option>
							@foreach($especialidades as $especialidad)
								<option value="{{ $especialidad->id }}" offset="1">{{ $especialidad->nombre }}</option>
							
							@endforeach
						</select>
					</div>
					<label>&nbsp;</label>
	
					<div class="row d-flex justify-content-center">
						<input type="submit" class='btn btn-primary btn-lg' value="Buscar Turnos">
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
	var select = document.getElementById('select_especialidad');
	select.addEventListener('change', function(evt) {
	this.setCustomValidity('');
	});
	select.addEventListener('invalid', function(evt) {
	// Required
	if (this.validity.valueMissing) {
		this.setCustomValidity('¡Por favor seleccione una Especialidad!');
	}
	});

</script>

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