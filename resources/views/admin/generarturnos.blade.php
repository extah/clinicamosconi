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

    <div class="col-8 col-sm-6 col-md-6 mx-auto">
        <div class="card text-black bg-info mb-3" style="max-width: 100rem;">
            <div class="card-body text-Black text-center">
              <h4 class="card-title">Generar turnos</h4>
            </div>                  
        </div>
    </div>
    <div class="form-group">
        <div class="my-2 pb-1 barrapaso-uno" id="barra1"></div>    
    </div>
    <article class="container col-12 mx-auto p-0">
        <div class="col-11 col-sm-11 col-md-4 col-lg-4 d-flex flex-column mx-auto p-0 my-4">
            <form id="demoForm" method="post" action="{{ url('admin/generarturnospost')  }}" data-toggle="validator" role="form">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="formItem" for="select_medico"> <b>MÉDICO</b></label>
                    <select name="select_medico" id="select_medico" class="form-control text-center" required>
                        {{-- <option value="">-Seleccioná una Especialidad-</option> --}}
                        <option value="todos">Todos los medicos</option>
                        @foreach($medicos as $medicos)
                            <option value="{{ $medicos->id }}" offset="1">{{ $medicos->nombre }} {{ $medicos->apellido }}</option>
                        
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_desde" class="formItem"><b>FECHA DESDE</b></label>
                    <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" placeholder="ingrese fecha desde" required>
                </div>
                <div class="form-group">
                    <label for="fecha_hasta" class="formItem"><b>FECHA HASTA</b></label>
                    <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" placeholder="ingrese fecha hasta" required>
                </div>
            <label>&nbsp;</label>

                <div class="row d-flex justify-content-center">
                    <input type="submit" class='btn btn-primary btn-lg' value="Generar Turnos">
                </div>
            </form>
        </div>	
    </article>
</div>

 
@endsection

@section('js')
<!-- <script src='{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}'></script> -->
<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src='{{ asset("assets/validity/jquery.validity.min.js") }}'></script>
<script src='{{ asset("assets/validity/jquery.validity.lang.es.js") }}'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  (function () {
    'use strict'
  
    var forms = document.querySelectorAll('.needs-validation')
  
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
  <script>
    @if (Session::get('status_info'))
            toastr.info( '{{ session('message') }}', 'ATENCIÓN', {
                // "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-bottom-right",
                "timeOut": "10000",
            });   
    @endif 
  </script>

<script>
    @if (Session::get('status_ok'))
            toastr.success( '{{ session('message') }}', 'Exito!!!', {
                // "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-bottom-right",
                "timeOut": "10000",
            });   
    @endif
</script>
@endsection