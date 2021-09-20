@extends('template/template')

@section('css')

    <link rel="stylesheet" href="{{ asset('css/especialidades.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css"> -->

@endsection

@section('content')

    <section class="mx-0 px-0">
        <article class="mx-auto px-0">
            <div class="row mx-0 px-0">
                <img class="img-fluid px-0" src={{ asset("images/img/banner-especialidades.png")}} alt="Imagen de portada de Especialidades">
                <div class="d-flex flex-column m-0 p-0">
                    <div class="__titulo-seccion-especialidades col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                        <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Especialidades</h5>
                    </div>
                </div>
            </div>
        </article>

        <article class="container col-12 mx-auto p-0">
                    <div class="col-8 d-flex flex-row justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center mx-auto p-2">
                        <h6 class="__subtitulo d-flex d-inline-block text-center text-sm-center text-md-center text-lg-center pl-lg-3">Encuentre la especialidad o el médico que necesita</h6>
                    </div>

                    {{-- <div class="d-grid gap-2 col-4 mx-auto">
                      <button class="btn btn-primary" type="button"><i class="fas fa-search-plus"></i> Buscar por Especialidad</button>
                      <button class="btn btn-primary" type="button"><i class="fas fa-search-plus"></i> Buscar por Medico</button>
                    </div> --}}

                    {{-- <div class="col-8 d-flex flex-column flex-sm-column flex-md-row flex-lg-row justify-content-center justify-content-sm-center justify-content-md-between justify-content-between mx-auto p-0"> --}}
                        <div class="d-grid gap-2 col-4 mx-auto">
                                    
                            <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalEspecialidad">
                              <i class="fas fa-search-plus"></i> Buscar por Especialidad
                            </button>
                    
                  
                            <!-- Modal Especialidad-->
                            <div class="modal fade" id="modalEspecialidad" tabindex="-1" aria-labelledby="modalEspecialidadLabel" aria-hidden="true" >
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: rgb(54, 105, 199)">
                                    <h5 class="modal-title" id="modalEspecialidadLabel" style="color: blanchedalmond">Buscar por Especialidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  
                                      <form id="formTurnosPorEspecialidad">    
                                          <meta name="csrf-token" content="{{ csrf_token() }}">
                                          <div class="modal-body">
                                          
                                            <select name="select_especialidades" id="select_especialidades" class="form-control" >
                                                              <option value="">-Seleccioná una especialidad-</option>
                                                              @foreach($especialidades as $especialidad)
                                                                <option value="{{ $especialidad->id }}" offset="1">{{ $especialidad->nombre }}</option>
                                                              
                                                              @endforeach
                                                            </select>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Buscar</button>
                                          </div>
                                      </form> 
                                </div>
                              </div>
                            </div>

                            <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalMedico">
                              <i class="fas fa-search-plus"></i> Buscar por Medico
                            </button>
                            
                          
                            <!-- Modal Medico-->
                            <div class="modal fade" id="modalMedico" tabindex="-1" aria-labelledby="modalMedicoLabel" aria-hidden="true" >
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: rgb(54, 105, 199)">
                                    <h5 class="modal-title" id="modalMedicoLabel" style="color: blanchedalmond">Buscar por Medico</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  
                                      <form id="formTurnosPorMedico">    
                                          <meta name="csrf-token" content="{{ csrf_token() }}">
                                          <div class="modal-body">
                                          
                                              <select name="select_medicos" id="select_medicos" class="form-control">
                                                <option value="">-Seleccioná un medico/a-</option>
                                                @foreach($medicos as $medico)
                                                    <option value="{{ $medico->id }}" offset="1">{{ $medico->nombre}} {{ $medico->apellido}} </option>
                                                @endforeach
                                              </select>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Buscar</button>
                                          </div>
                                      </form> 
                          
                          
                                </div>
                              </div>
                            </div>
                        </div>
                     <div id ="tabla" class="container col-10 mx-auto p-0 my-2" style="visibility: hidden" >                                         
                      <div class="container-datatable" >                                  
                          <div style="width: 100%; padding-left: -10px;">                                
                            <div class="table-responsive;">                                
                                <table id="tablaturnos" class="table table-striped table-hover dt-responsive display compact nowrap" cellspacing="0">                                
                                    <thead id="hola2" class="thead-dark" style="background-color: rgb(54, 105, 199)">                                
                                    <tr style="display: none" id="hola">                                
                                      <th style="color: blanchedalmond"><b>ESPECIALIDAD</b></th>                                
                                      <th style="color: blanchedalmond"><b>NOMBRE</b></th>                                
                                      <th style="color: blanchedalmond"><b>DIAS Y HORARIOS</b></th>                                
                                      <th style="color: blanchedalmond"><b>PAMI</b></th>                                
                                      <th style="color: blanchedalmond"><b>OBRAS SOCIALES</b></th>                                
                                      <th style="color: blanchedalmond"><b>CONSULTA PARTICULAR</b></th>                                
                                      <th style="color: blanchedalmond"><b>OTROS</b></th>                                
                                    </tr>                                
                                    </thead>                                
                                </table>                                
                              </div>                                
                          </div>                                
                      </div>                                
                  </div>                               

                    <div class="col-12 d-flex mx-auto my-4">
                        <div class="container col-8 __botones-servicios mx-auto px-0 d-flex flex-column flex-sm-column flex-md-row flex-lg-row ">
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/portal-paciente-grande.jpg" alt="Portal del paciente"></a>
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-web-grande.jpg" alt="Guardia web"></a>
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-pediatrica-grande.jpg" alt="Guardia pediátrica"></a>
                        </div>
                    </div>
        </article>

    </section>


    {{-- <div id ="tabla" class="container" >
      <table id="tablaturnos" class="table table-striped table-hover dt-responsive nowrap" style="width:100%">
        <meta name="csrf-token_feriado" content="{{ csrf_token() }}">  
        <thead class="thead-dark" style="background-color: rgb(54, 105, 199)">
              <tr>
                  <th style="color: blanchedalmond">ESPECIALIDAD</th>
                  <th style="color: blanchedalmond">NOMBRE</th>
                  <th style="color: blanchedalmond">DIAS Y HORARIOS DE ATENCION</th>
                  <th style="color: blanchedalmond">PAMI</th>
                  <th style="color: blanchedalmond">OBRAS SOCIALES</th>
                  <th style="color: blanchedalmond">CONSULTA PARTICULAR</th>
                  <th style="color: blanchedalmond">OTROS</th>
              </tr>
          </thead>
          <!-- <tbody>

          </tbody> -->
      </table>

</div> --}}

@endsection

@section('js')
{{-- <script src="{{ asset('assets/MDB5-STANDARD-UI-KIT-Free-3.9.0/js/mdb.min.js') }}"></script> --}}

<script>

$(document).ready(function() {

  var fecha, opcion;
        opcion = 2;
  // tablaturnos = $('#tablaturnos').DataTable(
    
    tablaturnos = $('#tablaturnos').DataTable( 
        {
        "columns": [
                        { data: "especialidad" ,},
                        { data: "nombre_medico" ,},
                        { data: "dia_horario" ,  },
                        { data: "pami" , },
                        { data: "obra_social" ,  },
                        { data: "consulta_particular" , },   
                        { data: "otros" ,  },                                             
                        // { data: "Apellido" },
                    ],
          responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal( {
                                header: function ( row ) {
                                    var data = row.data();
                                    return data["especialidad"] + ', Medico '+data["nombre_medico"];
                                }
                            } ),
                            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                                tableClass: 'table'
                            } )
                        }
                    },
        //             scrollY:        300,
        // scrollCollapse: true,
        // paging:         false,
        // "scrollX": false,
        select: true,
        colReorder: true,
        "autoWidth": false,
         "order": [[ 0, "asc" ]],
        //  "paging":   false,
         "ordering": true,
        //  "responsive": true,
         "info":     false,
         "dom": 'Bfrtilp',
         'columnDefs': [
                          {'max-width': '20%', 'targets': 0}
                       ],
        //  "data": dataSet,

        //  "buttons": [ 'copy', 'csv', 'excel', 'pdf', 'print' ],
         "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
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

            // "buttons":[
            //     {
            //         extend:    'excelHtml5',
            //         text:      '<i class="fas fa-file-excel"></i> EXCEL ',
            //         titleAttr: 'Exportar a Excel',
            //         className: 'btn btn-success'
            //     },
            //     {
            //         extend:    'pdfHtml5',
            //         text:      '<i class="fas fa-file-pdf"></i> PDF',
            //         titleAttr: 'Exportar a PDF',
            //         className: 'btn btn-danger'
            //     },
            //     {
            //         extend:    'print',
            //         text:      '<i class="fa fa-print"></i> IMPRIMIR',
            //         titleAttr: 'Imprimir',
            //         className: 'btn btn-info'
            //     },
            //  ]                 
        });
        // opcion = 1;
        $('#formTurnosPorEspecialidad').submit(function(e){                         
                e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
                
                select_especialidades = $.trim($('#select_especialidades').val()); 
                opcion = 1; 
                $('#tablaturnos').DataTable().clear().draw(); 
                
                $('#hola').show(); 
                $('#hola2').show(); 
                document.getElementById("tabla").style.visibility = "visible";
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: "{{route('especialidades.turnosasignadosdatatable')}}",
                    type: "POST",
                    datatype:"json",    
                    data:  {
                        '_token': $('input[name=_token]').val(),
                        select_especialidades:select_especialidades, opcion:opcion},    

                    success: function(data) {
                        // console.log(data);

                        var text = data;
                        var data = JSON.parse(text);

                        tablaturnos.rows.add(data).draw();

                        // swal("Se genero el feriado con Exito!", "", "success"); 
                    },
                });	
                // responsive = true;
                // $('#exampleModal').modal('hide');	 
            // $('#modalCRUD').modal('hide');											     			
        });

        $('#formTurnosPorMedico').submit(function(e){                         
                e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
                
                select_medicos =  $.trim($('#select_medicos').val());
                opcion = 3; 
                $('#tablaturnos').DataTable().clear().draw();  
                // $('#tabla').show(); 
                document.getElementById("tabla").style.visibility = "visible";
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: "{{route('especialidades.turnosasignadosdatatable')}}",
                    type: "POST",
                    datatype:"json",    
                    data:  {
                        '_token': $('input[name=_token]').val(),
                        select_medicos:select_medicos, opcion:opcion},    

                    success: function(data) {
                        // console.log(data);

                        var text = data;
                        var data = JSON.parse(text);

                        tablaturnos.rows.add(data).draw();

                        // swal("Se genero el feriado con Exito!", "", "success"); 
                    },
                });	

                // $('#exampleModal').modal('hide');	 
            // $('#modalCRUD').modal('hide');											     			
        });
        

} );


</script>
@endsection