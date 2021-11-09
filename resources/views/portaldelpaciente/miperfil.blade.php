@extends('template/template')

@section('css')

<link rel="stylesheet" href="{{ asset('css/barrapasoYcirculo.css') }}">

<style type="text/css">

.formItem{
  display: block;
  text-align: center;
  line-height: 150%;
}

</style>
@endsection

@section('content')
<article class="mx-auto px-0">
  <div class="row mx-0 px-0">
      <img class="img-fluid px-0" src={{ asset("images/img/banner-turnos.png")}} alt="Imagen de portada de Especialidades">
  </div>
</article>
<div class="p-0 mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #04205f;">
    <div class="container-fluid">
      <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Mi Perfil</h5>
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
    		<div class="col-11 col-sm-11 col-md-10 col-lg-10 d-flex flex-column mx-auto p-0 my-4 gap-3">
          <form id="form_editardatos" onsubmit="return miFuncion(this)" class="needs-validation" novalidate method="post" action="{{ url('portaldelpaciente/editardatos') }}">
            @csrf
            <div class="row g-3">
              <div class="col-md-3">
                  <label for="nombre_apellido" class="form-label"><b>NOMBRE Y APELLIDO</b></label>
                  <input type="text" class="form-control" id="nombre_apellido" name="nombre_apellido" placeholder="ingrese su nombre y apellido" value="{{ $usuario->nombreyApellido }}" readonly required>
              </div>
              <div class="col-md-3">
                  <label for="email" class="form-label"><b>CORREO ELECTRONICO</b></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="ingrese su correo electronico" value="{{ $usuario->email }}" readonly required>
              </div>
              <div class="col-md-3">
                  <label for="telefono" class="form-label"><b>CELULAR</b></label>
                  <input type="number" class="form-control" id="telefono" name="telefono" placeholder="ingrese su numero de celular" value="{{ $usuario->telefono }}" readonly required>
              </div>
              <div class="col-md-3">
                  <label for="dni" class="form-label"><b>DNI</b></label>
                  <input type="number" class="form-control" id="dni" name="dni" placeholder="ingrese su dni" value="{{ $usuario->dni }}" readonly required>
              </div>
              <div class="col-md-3">
                <label for="fecha_nac" class="form-label"><b>FECHA NACIMIENTO</b></label>
                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="ingrese su fecha de nacimiento" value="{{ $usuario->fecha_nacimiento }}" readonly required>
              </div>
              <div class="col-md-3">
                <label for="obra_social" class="form-label"><b>OBRA SOCIAL</b></label>
                <input type="text" class="form-control" id="obra_social" name="obra_social" placeholder="ingrese su obra_social" value="{{ $usuario->obra_social }}" readonly required>
              </div>
              <div class="col-md-3">
                <label for="nro_afiliado" class="form-label"><b>NUMERO DE AFILIADO</b></label>
                <input type="number" class="form-control" id="nro_afiliado" name="nro_afiliado" placeholder="ingrese su nro de afiliado" value="{{ $usuario->nro_afiliado }}" readonly required>
              </div>
              <div class="form-group" >
                <div class='g-recaptcha' data-sitekey='6LfpoScUAAAAAA2usCdAwayw_KQiHe44y5e1Whk-'></div>
                <div id='errorRecaptcha' style='display:none; color:#a94442' required>    <span class='glyphicon glyphicon-exclamation-sign'></span>    Por favor, verifica que no seas un robot.</div>
              </div>
                <div class="col-md-6 d-grid gap-2">
                  <button type="button" class="btn btn-secondary btn-lg" onclick="sacarReadOnly()">Editar</button>
                </div>
                <div class="col-md-6 d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                </div>
              
              
              
              
            </div>
          </form>           
			</div>	
		</article>
</div>
@endsection

@section('js')
<script src='https://www.google.com/recaptcha/api.js?hl=es' async defer> </script>
<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<script src="{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src="{{ asset('assets/select2/select2.full.js') }}"></script>
<script src='{{ asset("assets/toastr/toastr.min.js") }}'></script>
<script src='{{ asset("assets/sweetalert/sweet-alert.min.js") }}'></script>

<script>
  function sacarReadOnly() {
  document.getElementById("nombre_apellido").readOnly = false;
  document.getElementById("email").readOnly = false;
  document.getElementById("telefono").readOnly = false;
  document.getElementById("dni").readOnly = false;
  document.getElementById("fecha_nac").readOnly = false;
  document.getElementById("obra_social").readOnly = false;
  document.getElementById("nro_afiliado").readOnly = false;
}
</script>
<script>
  function miFuncion(a) {
      var response = grecaptcha.getResponse();
      if(response.length == 0){
          // alert("Captcha no verificado");
          
          $("#errorRecaptcha").show();
          toastr.error("validar reCAPTCHA", 'VERIFICA QUE NO SOS UN ROBOT', {
                      // "progressBar": true,
                      "closeButton": true,
                      "positionClass": "toast-top-right",
                      "timeOut": "10000",
                  });  
          return false;
        event.preventDefault();
      } else {
      //   alert("Captcha verificado");
        return true;
      }
    }
  </script>
<script>
    @if (Session::get('status_info'))
            toastr.info( '{{ session('message') }}', 'Informar', {
                // "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
                "timeOut": "10000",
            });   
    @endif 
</script>
<script>
  (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
@endsection