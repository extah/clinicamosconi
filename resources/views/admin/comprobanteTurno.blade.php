@extends('admin/admin')

@section('css')

<link href="{{ asset('/assets/select2/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/toastr/toastr.min.css') }}" rel="stylesheet">

<link href="{{ asset('/assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>

<style type="text/css">
 .btn_personalizado{
  text-decoration: none;
  padding: 10px;
  font-weight: 600;
  font-size: 20px;
  color: #ffffff;
  background-color: #1883ba;
  border-radius: 6px;
  border: 1px solid #0016b0;
}
.formItem{
  display: block;
  text-align: center;
  line-height: 150%;
  /* font-size: .85em; */
}
.card-body
{
    border:  solid #0c6e04;
    background-color:#f4faff;
}
.barrapaso-dos {
    border-top: 8px solid #0c6e04;
    padding-top: 10px;
}

</style>
@endsection

@section('content')

<div class="container">

	<div class="col-8 col-sm-6 col-md-6 mx-auto">
		<div class="card text-black bg-info mb-3" style="max-width: 100rem;">
			<div class="card-body text-Black text-center">
				<h4 class="card-title">Comprobante del Turno</h4>
			</div>                  
		</div>
	</div>
	<div class="form-group">
		<div class="my-2 pb-1 barrapaso-dos" id="barra2"></div>    
    </div>
	<article class="container col-12 mx-auto p-0">
    		<div class="col-11 col-sm-11 col-md-4 col-lg-4 d-flex flex-column mx-auto p-0 my-4">
				<div class="form-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>N&deg; DE COMPROBANTE: </b>  &nbsp; {{ $comprobante_id }}</div>
					</div>
				</div>
        <div class="form-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>NOMBRE Y APELLIDO: </b>  &nbsp; {{ $usuario->nombreyApellido }}</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b> FECHA: </b> &nbsp; {{ $fecha }}</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>HORA: </b>  &nbsp; {{ $hora }}</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>N&deg; DE DOCUMENTO: </b>  &nbsp; {{ $dni }}</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>ESPECIALIDAD: </b>  &nbsp; {{ $especialidad_nombre }}</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group-prepend">
						<div class="input-group-text"><b>MEDICO: </b>  &nbsp; {{ $medico_nombre }}</div>
					</div>
				</div>

			</div>
			<div class="col-11 col-sm-11 col-md-10 col-lg-8 d-flex flex-column mx-auto p-0 my-4">
				<div class="row d-flex justify-content-center">
					<a  class="btn btn-success" href="descargarcomprobante/{{ $comprobante_id }}/{{ $dni }}" role="button"><h4><i class="fa fa-download" aria-hidden="true"></i> Descargar comprobante</h4></a>
				</div>		
			</div>
		</article>


</div>
@endsection

@section('js')

<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="{{ asset('/assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/assets/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js') }}"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->



<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src="{{ asset('assets/select2/select2.full.js') }}"></script>
<script src='{{ asset("assets/toastr/toastr.min.js") }}'></script>
<script src='{{ asset("assets/sweetalert/sweet-alert.min.js") }}'></script>

<script>
        @if ($status)
                toastr.success(" {{ "El turno se registro "}}", '&Eacute;xito!!!', {
                    "progressBar": true,
                    "closeButton": true,
                    "positionClass": "toast-bottom-right",
                    "timeOut": "20000",
                });   
		@endif 
</script>

@endsection