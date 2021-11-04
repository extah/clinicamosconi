@extends('admin/admin')

@section('css')
    <link href="{{ asset('/assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>
    
    <style>
        .modal-header {
            background-color: #04205f;
            color: rgb(226, 226, 226);
        }
    </style>
@endsection

@section('content')

<div class="container">
  <div class="d-flex justify-content-center">
      <h1 style="color:#428bca">Listado de turnos Asignados</h1>
  </div>
  <hr>

    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex flex-column mx-auto p-0 my-2 gap-1">
        <div class="row g-2">
            <div class="col-md-2">
                <a class="btn btn-primary btn-rounded" href='{{route("admin.agregarturno")}}'><i class="fas fa-plus-square"></i> Agregar Turno</a>
            </div>
            <div class="col-md-3">
                <button id="btnBuscarporDNI" type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalTurnos">
                    <i class="fas fa-search"></i> Buscar Turno por DNI
                </button>
            </div>
        </div>
    </div>
    <br>
    <div class="col-lg-12"> 
      <div class="table-responsive">  
          <table id="tablaTurnos" class="table table-striped table-hover table-bordered display" cellspacing="0" style="width:100%">
              <meta name="csrf-token_imagenes" content="{{ csrf_token() }}">
              <thead class="thead-dark text-center">
                  <tr>
                      <th>ID</th>
                      <th>ESPECIALIDAD</th>
                      <th>MEDICO</th>
                      <th>PACIENTE</th>
                      <th>FECHA</th>
                      <th>HORA</th>
                      <th>ACCIONES</th>
                  </tr>    
              </thead>
              <tbody>

              </tbody>
          </table>
      </div>    
  </div>       
</div>

<!-- Modal buscar por DNI-->
<div class="modal fade" id="modalTurnos" tabindex="-1" aria-labelledby="modalTurnosLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(54, 105, 199)">
        <h5 class="modal-title" id="modalTurnosLabel" style="color: blanchedalmond">Buscar turnos por DNI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <form action="{{route('admin.tablaturnos')}}" method="POST" id="formTurnos" class="needs-validation" enctype="multipart/form-data">   
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12 mb-3" style="display:none;">
                    <!-- <div class="col-lg-12 mb-3"> -->
                        <div class="form-group">
                            <label class="formItem" for="opcion_buscar" id="opcion_input"> <b>OPCION</b></label>
                            <input type="text" class="form-control" id="opcion_buscar" name="opcion_buscar">
                        </div> 
                    </div> 
                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <label class="formItem" for="dni"> <b>DNI</b></label>
                            <input type="number" class="form-control" id="dni" name="dni" required>
                        </div> 
                    </div>     
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Buscar</button>
                </div>
          </form> 
    </div>
  </div>
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
<script src='{{ asset("assets/toastr/toastr.min.js") }}'></script>
<script src='{{ asset("assets/validity/jquery.validity.min.js") }}'></script>
<script src='{{ asset("assets/validity/jquery.validity.lang.es.js") }}'></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="{{ asset("assets/sweetalert/sweetalert.min.js") }}"></script>

<script>

$(document).ready(function() {

  var id, opcion, titulo;
        opcion = 4;
    
        tablaTurnos = $('#tablaTurnos').DataTable( 
        {
        //"dom": '<"dt-buttons"Bf><"clear">lirtp',
        "ajax":{            
                        "headers": { 'X-CSRF-TOKEN': $('meta[name="csrf-token_imagenes"]').attr('content') },    
                        "url": "{{route('admin.tablaturnos')}}", 
                        "method": 'post', //usamos el metodo POST
                        "data":{
                            '_token': $('input[name=_token]').val(),
                            opcion:opcion}, //enviamos opcion 1 para que haga un SELECT
                        "dataSrc":""
                    },
        "columns": [
                        { data: "id" },
                        { data: "especialidad"},
                        { data: "medico" },
                        { data: "persona" },
                        { data: "fecha" },    
                        { data: "hora" },   
                        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='fas fa-edit'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fas fa-trash-alt'></i></button></div></div>"},
                        
                    ],
        responsive: {
        },
        select: true,
        colReorder: true,
        "autoWidth": false,
         "order": [[ 0, "desc" ]],
         "paging":   true,
         "ordering": true,
         "info":     false,
         "dom": 'Bfrtilp',
         'columnDefs': [
                          {'max-width': '20%', 'targets': 0}
                       ],
         
         "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningun dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sSearch":         "Buscar:",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    },   
                "buttons":[
                    {
                    extend:    'copyHtml5',
                    text:      '<i class="fas fa-copy"></i> COPIAR ',
                    titleAttr: 'Copiar datos',
                    className: 'btn btn-dark'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fas fa-file-excel"></i> EXCEL ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fas fa-file-pdf"></i> PDF',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend:    'print',
                    text:      '<i class="fas fa-print"></i> IMPRIMIR',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                },
             ]              
        });    
            

        $("#btnBuscarporDNI").click(function(){        
            fila = $(this).closest("tr");
            opcion = 5; 
            
            $("#formTurnos").trigger("reset");
            $("#opcion_buscar").val('5');
        });

        var fila; //captura la fila, para editar o eliminar

        //submit para el Alta y Actualización
        $('#formTurnos').submit(function(e){                         
                e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
                var form = this;

                $('#tablaTurnos').DataTable().clear().draw(); 
                $('#modalTurnos').modal('hide');

                $.ajax({
                    url: $(form).attr("action"),
                    method: $(form).attr('method'),
                    data: new FormData(form), 
                    datatype: "json",   
                    cache:  false,
                    processData:  false,
                    contentType:  false, 

                    success: function(data) {

                        var text = data;
                        var data = JSON.parse(text);

                        tablaTurnos.rows.add(data).draw();
                    },
                });			        										     			
        });

        //Borrar
        $(document).on("click", ".btnBorrar", function(){
            fila = $(this).closest("tr");         

            if($(this).parents("tr").hasClass('child')){ //vemos si el actual row es child row
                var id = $(this).parents("tr").prev().find('td:eq(0)').text(); //si es asi, nos regresamos al row anterior, es decir, al padre y obtenemos el id
                var paciente = $(this).parents("tr").prev().find('td:eq(3)').text();
                var fecha = $(this).parents("tr").prev().find('td:eq(4)').text();
                var hora = $(this).parents("tr").prev().find('td:eq(5)').text();
            } else {
                var id = $(this).closest("tr").find('td:eq(0)').text(); //si no lo es, seguimos capturando el id del actual row
                var paciente = $(this).closest("tr").find('td:eq(3)').text();
                var fecha = $(this).closest("tr").find('td:eq(4)').text();
                var hora = $(this).closest("tr").find('td:eq(5)').text();
            }

            opcion = 3; //eliminar 
            swal({
                  title: "¿Esta seguro de cancelar el turno de " + paciente + " con fecha: "+fecha+" y horario: "+ hora +"hs?",
                  icon: "warning",
                  buttons: ["Cancelar", "Cancelar"],
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token_turnos"]').attr('content') },
                                url: "{{route('admin.tablaturnos')}}",
                                type: "POST",
                                datatype:"json",      
                                data:  {
                                    '_token': $('input[name=_token]').val(),
                                    opcion:opcion, id:id},    
                                success: function() {
                                    tablaTurnos.row(this).remove().draw(); 
                                    swal("Turno cancelado con Exito!!!", {
                                    icon: "success",
                                    });                
                                }
                            });

                  } else {
                    swal("El turno no fue cancelado");
                  }
                }); 
        }) 
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
@endsection