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
        <div class="card text-black mb-3" style="max-width: 100rem;">
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
                {{-- {{ csrf_field() }} --}}
                <meta name="csrf-token_medicos" content="{{ csrf_token() }}">
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                <div class="form-group">
                    <label class="formItem" for="select_especialidad"> <b>Especialidad</b></label>
                    <select name="select_especialidad" id="select_especialidad" class="form-control text-center" required>
                        <option value="">-Seleccioná una Especialidad-</option>
                        @foreach($especialidades as $especialidad)
                            <option value="{{ $especialidad->id }}" offset="1">{{ $especialidad->nombre }}</option>
                        
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="formItem" for="select_medico"> <b>Medico</b></label>
                    <select name="select_medico" id="select_medico" class="form-control text-center" required>
                        <option value="">-Seleccioná un medico-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="formItem" for="select_fecha"> <b>Fecha</b></label>
                    <select name="select_fecha" id="select_fecha" class="form-control text-center" required>
                        <option value="">-Seleccioná una fecha-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="formItem" for="select_hora"> <b>Hora</b></label>
                    <select name="select_hora" id="select_hora" class="form-control text-center" required>
                        <option value="">-Seleccioná una hora-</option>
                    </select>
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

<script src='{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}'></script>
<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src='{{ asset("assets/validity/jquery.validity.min.js") }}'></script>
<script src='{{ asset("assets/validity/jquery.validity.lang.es.js") }}'></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="{{ asset("assets/sweetalert/sweetalert.min.js") }}"></script>

<script type="text/javascript">
    var url = "{{route('admin.getMedicos')}}";
    // var select_especialidad = document.getElementById("select_especialidad");
    $(document).ready(function(e) {
        $("#select_especialidad").change(function(){
            var id_especialidad = $("#select_especialidad").val();
            // alert(id_especialidad);
            $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token_medicos"]').attr('content') },
                    url: "{{route('admin.getMedicos')}}",
                    type: "POST",
                    datatype:"json",      
                    data:  {
                        '_token': $('input[name=_token]').val(),
                        select_especialidad:id_especialidad, 
                    },  
                    success:function(data) {
                        console.log(data);
                        var obj = JSON.parse(data);
                        $("#select_medico option").remove();
                        for(i=0; i<data.length; i++) {
                            $('#select_medico').append("<option value="+obj[i].id+">"+obj[i].nombre+ " " + obj[i].apellido+"</option>");                      
                        }
                    }             
                    
                });
        })
        /*$.ajax({
                                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token_imagenes"]').attr('content') },
                                        url: "{{route('admin.imageneseliminareditar')}}",
                                        type: "POST",
                                        datatype:"json",      
                                        data:  {
                                            '_token': $('input[name=_token]').val(),
                                            select_especialidad:select_especialidad},    
                                        success: function(response) {
                                         
                                            swal("Imagen Eliminada con Exito!!!", {
                                            icon: "success",
                                          });                
                                        }
                                    });*/
    });

</script>

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

<script>
    $('#fecha_desde').attr('min', new Date().toISOString().split('T')[0]);
    $('#fecha_hasta').attr('min', new Date().toISOString().split('T')[0])
</script>

@endsection