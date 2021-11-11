@extends('admin/admin')

@section('css')
    <link href="{{ asset('/assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/barrapasoYcirculo.css') }}">
    
    <style>
        .modal-header {
            background-color: #04205f;
            color: rgb(226, 226, 226);
        }
        .formItem{
            display: block;
            text-align: center;
            line-height: 150%;
        }
    </style>
@endsection

@section('content')
<div class="container col-12 mx-auto p-0">


    @if($buscar)
        <div class="col-8 col-sm-6 col-md-6 mx-auto">
            <div class="card text-black mb-3" style="max-width: 100rem;">
                <div class="card-body text-Black text-center">
                <h4 class="card-title">Agregar un turno</h4>
                </div>                  
            </div>
        </div>
        <div class="form-group">
            <div class="my-2 pb-1 barrapaso-uno" id="barra1"></div>    
        </div>
        <article class="container col-12 mx-auto p-0">
            <div class="col-11 col-sm-11 col-md-4 col-lg-4 d-flex flex-column mx-auto p-0 my-4">
                <form id="demoForm" method="post" action="{{ url('admin/agregarunturno')  }}" data-toggle="validator" role="form">
                    @csrf
                    <div class="form-group">
                        <label class="formItem" for="dni"> <b>DNI</b></label>
                        <input class="form-control text-center" type="number" id="dni" name="dni" placeholder="Ingrese el DNI del paciente" required>
                    </div>
                    <label>&nbsp;</label>
                    <div class="row d-flex justify-content-center">
                        <input type="submit" class='btn btn-primary btn-lg' value="Buscar persona">
                    </div>
                </form>
            </div>	
        </article>        
    @else
        <div class="col-8 col-sm-6 col-md-6 mx-auto">
            <div class="card text-black mb-3" style="max-width: 100rem;">
                <div class="card-body text-Black text-center">
                <h4 class="card-title">Agregar paciente</h4>
                </div>                  
            </div>
        </div>
        <div class="form-group">
            <div class="my-2 pb-1 barrapaso-uno" id="barra1"></div>    
        </div>
		<article class="container col-12 mx-auto p-0">
    		<div class="col-11 col-sm-11 col-md-10 col-lg-10 d-flex flex-column mx-auto p-0 my-4 gap-3">
                <form id="demoForm" method="post" action="{{ url('admin/registrarPaciente')  }}" class="needs-validation" novalidate data-toggle="validator" role="form">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="nombre" class="form-label"><b>NOMBRE</b></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ingrese el nombre" required>
                        </div>
                        <div class="col-md-3">
                            <label for="apellido" class="form-label"><b>APELLIDO</b></label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="ingrese el apellido" required>
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label"><b>CORREO ELECTRONICO</b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="ingrese el correo electronico" required>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono" class="form-label"><b>CELULAR</b></label>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="ingrese el numero de celular" required>
                        </div>
                        <div class="col-md-3">
                            <label for="dni" class="form-label"><b>DNI</b></label>
                            <input type="number" class="form-control" id="dni" name="dni" placeholder="ingrese el DNI" required>
                        </div>

                          <div class="col-md-12 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                          </div>                     
                        
                      </div>
                      <br>
                      <div><b>*Al registrar un paciente, se genera un usuario (su correo electronico) y una contraseña (su numero de DNI)</b></div>
                      <div><b>*Link donde puede entrar www.clinicamosconi.com.ar/portaldelpaciente</b></div>
                </form>
            </div>	
        </article> 
    @endif


</div>

 
@endsection

@section('js')

<script src='{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}'></script>
<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src='{{ asset("assets/validity/jquery.validity.min.js") }}'></script>
<script src='{{ asset("assets/validity/jquery.validity.lang.es.js") }}'></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="{{ asset("assets/sweetalert/sweetalert.min.js") }}"></script>

<script>
    @if ($status_info)
        toastr.info( '{{ $message }}', 'ATENCION', {
                    // "progressBar": true,
                    "closeButton": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "30000",
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