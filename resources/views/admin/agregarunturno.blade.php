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
              <h4 class="card-title">Agregar un turno</h4>
            </div>                  
        </div>
    </div>
    <div class="form-group">
        <div class="my-2 pb-1 barrapaso-uno" id="barra1"></div>    
    </div>
    <article class="container col-12 mx-auto p-0">
        <div class="col-11 col-sm-11 col-md-4 col-lg-4 d-flex flex-column mx-auto p-0 my-4">
            <form id="demoForm" method="post" action="{{ url('admin/agregarunturnoPost')  }}" data-toggle="validator" role="form">
                @csrf
                <meta name="csrf-token_medicos" content="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="formItem" for="nombre_paciente"> <b>Paciente</b></label>
                    <input  class="form-control text-center" type="text" name="nombre_paciente" id="nombre_paciente" value="{{ $persona->nombreyApellido}}/{{ $persona->dni}}" disabled>
                </div>
                <input id="personaID" name="personaID" type="hidden" value="{{ $persona->id}}">

                <div class="form-group">
                    <label class="formItem" for="select_especialidad"> <b>Especialidad</b></label>
                    <select name="select_especialidad" id="select_especialidad" class="form-control text-center" required>
                        <option value="">-Seleccion&aacute una Especialidad-</option>
                        @foreach($especialidades as $especialidad)
                            <option value="{{ $especialidad->id }}" offset="1">{{ $especialidad->nombre }}</option>
                        
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="formItem" for="select_medico"> <b>Medico</b></label>
                    <select name="select_medico" id="select_medico" class="form-control text-center" required>
                        <option value="">-Seleccion&aacute un medico-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="formItem" for="fecha_turno"> <b>Fecha</b></label>
                    <input class="form-control text-center" data-date-format="dd/mm/yyyy" id="fecha_turno" name="fecha_turno" required>
                </div>
                <div class="form-group">
                    <label class="formItem" for="select_hora"> <b>Hora</b></label>
                    <select name="select_hora" id="select_hora" class="form-control text-center" required>
                        <option value="">-Seleccion&aacute una hora-</option>
                    </select>
                </div>

                <label>&nbsp;</label>

                <div class="form-group d-flex justify-content-center">
                    <input type="submit" class='btn btn-primary btn-lg' value="Agregar un turno">
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
                        // console.log(data.length);
                        var obj = JSON.parse(data);
                        // console.log(obj.length);
                        $("#select_medico option").remove();
                        $('#select_medico').append("<option value=''>-Seleccion&aacute un medico-</option>");
                        $("#select_hora option").remove();
                        $('#select_hora').append("<option value=''>-Seleccion&aacute un medico-</option>");
                        $("#fecha_turno").datepicker("destroy");
                        $( "#fecha_turno" ).datepicker( "refresh" );
                        $( "#fecha_turno" ).val("dd/mm/aaaa");
                        $("#fecha_turno").attr('readonly', true);
                        for(i=0; i<obj.length; i++) {
                            $('#select_medico').append("<option value="+obj[i].id+">"+obj[i].nombre+ " " + obj[i].apellido+"</option>");                      
                        }


                    }             
                    
                });
        }),
        $("#select_medico").change(function(){
            var id_especialidad = $("#select_especialidad").val();
            var id_medico = $("#select_medico").val();
            // alert(id_medico);
            // alert(id_especialidad);
            $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token_medicos"]').attr('content') },
                    url: "{{route('admin.getFechasDisponible')}}",
                    type: "POST",
                    datatype:"json",      
                    data:  {
                        '_token': $('input[name=_token]').val(),
                        select_especialidad:id_especialidad, select_medico:id_medico,
                    },  
                    success:function(data) {
                        $("#fecha_turno").datepicker("destroy");
                        $( "#fecha_turno" ).datepicker( "refresh" );
                        $("#select_hora option").remove();
                        $('#select_hora').append("<option value=''>-Seleccion&aacute un medico-</option>");
                        $("#fecha_turno").attr('readonly', false);
                        var dias = JSON.parse(data);
                        // var enableDays = ["08/06/2021","09/06/2021","10/06/2021","12/06/2021"];
                        var enableDays =  dias;
                        
                        function enableAllTheseDays(date) {
                            var sdate = $.datepicker.formatDate( 'dd/mm/yy', date)
                            // console.log(sdate)
                            if($.inArray(sdate, enableDays) != -1) {
                                return [true];
                            }
                            return [false];
                        }
                        $('#fecha_turno').datepicker(
                        {
                            dateFormat: 'dd/mm/yy', 
                            weekStart: 1,
                            todayHighlight: true,
                            beforeShowDay: enableAllTheseDays,

                        }); 
                        $('#fecha_turno').datepicker("setDate", dias[0]);                              
                    
                    }
            });        
        }),

        $("#fecha_turno").change(function(){
            var id_especialidad = $("#select_especialidad").val();
            var id_medico = $("#select_medico").val();
            var fechaParam = $("#fecha_turno").val();

            // alert(fechaParam);
            $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token_medicos"]').attr('content') },
                    url: "{{route('admin.getHorasDisponible')}}",
                    type: "POST",
                    datatype:"json",      
                    data:  {
                        '_token': $('input[name=_token]').val(),
                        select_especialidad:id_especialidad, select_medico:id_medico, fechaParam:fechaParam,
                    },  
                    success:function(data) {
                        var horas = JSON.parse(data);
                        // console.log(horas);
                        $("#select_hora option").remove();
                        $('#select_hora').append("<option value=''>-Seleccion&aacute un medico-</option>");

                        for(i=0; i<horas.length; i++) {
                            $('#select_hora').append("<option value="+horas[i].id+">"+horas[i].hora+"</option>");                      
                        }
                    }   
            });  
        })

    });

</script>

<script>
	jQuery(function(){

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '<Ant',
			nextText: 'Sig>',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi&eacutercoles', 'Jueves', 'Viernes', 'S&aacutebado'],
			dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mi&eacute', 'Juv', 'Vie', 'S&aacuteb'],
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'S&aacute'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};

		$.datepicker.setDefaults($.datepicker.regional['es']);
		

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
            toastr.info( '{{ session('message') }}', 'ATENCI&oacuteN', {
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