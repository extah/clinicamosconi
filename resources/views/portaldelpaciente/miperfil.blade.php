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
                  <h4 class="card-title">Mi Perfil</h4>
                </div>                  
            </div>
        </div>
		<div class="form-group">
        <div class="my-2 pb-1 barrapaso-uno" id="barra1"></div>    
    </div>

		<article class="container col-12 mx-auto p-0">
    		<div class="col-11 col-sm-11 col-md-4 col-lg-4 d-flex flex-column mx-auto p-0 my-4 gap-3">
          <!-- <div class="form-group">
              <label class="formItem" for="nombreyApellido"> <b>Nombre y Apellido</b></label>
              <input  class="form-control" type="text" name="nombreyApellido" id="nombreyApellido" value="{{ $usuario->nombreyApellido}}" disabled>
					</div> -->
          <div class="form-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><b>Nombre y Apellido: </b>  &nbsp; {{ $usuario->nombreyApellido }}</div>
            </div>
				  </div>
          <div class="form-group">
            <div class="input-group-prepend">
              <div class="input-group-text"><b>Nombre y Apellido: </b>  &nbsp; {{ $usuario->nombreyApellido }}</div>
            </div>
				  </div>
          <div class="form-group">
              <label class="formItem" for="email"> <b>Email</b></label>
              <input  class="form-control" type="text" name="email" id="email" value="{{ $usuario->email}}" disabled>
					</div>
          <div class="form-group">
              <label class="formItem" for="telefono"> <b>Telefono</b></label>
              <input  class="form-control" type="text" name="telefono" id="telefono" value="{{ $usuario->telefono}}" disabled>
					</div>
          <div class="form-group">
              <label class="formItem" for="nombreyApellido"> <b>Nombre y Apellido</b></label>
              <input  class="form-control" type="text" name="nombreyApellido" id="nombreyApellido" value="{{ $usuario->nombreyApellido}}" disabled>
					</div>
          <div class="form-group">
              <label class="formItem" for="nombreyApellido"> <b>Nombre y Apellido</b></label>
              <input  class="form-control" type="text" name="nombreyApellido" id="nombreyApellido" value="{{ $usuario->nombreyApellido}}" disabled>
					</div>
			</div>	
		</article>
</div>
@endsection

@section('js')

<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<script src="{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}"></script>
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