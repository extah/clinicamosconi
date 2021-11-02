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
      <h1 style="color:#428bca">Listado de Imagenes</h1>
  </div>
  <hr>


    <div class="col-lg-12">
      <button id="btnNuevo" type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#modalImagen">
        <i class="fas fa-plus-square"></i> Agregar imagen
      </button>
    </div>

    <br>

    <div class="col-lg-12"> 
      <div class="table-responsive">  
          <table id="tablaImagenes" class="table table-striped table-hover table-bordered display" cellspacing="0" style="width:100%">
              <meta name="csrf-token_imagenes" content="{{ csrf_token() }}">
              <thead class="thead-dark text-center">
                  <tr>
                      <th>ID</th>
                      <th>TITULO</th>
                      <th>IMAGEN</th>
                      <th>TIPO</th>
                      <th>DESCRIPCION</th>
                      <th>FECHA CREADO</th>
                      <th>FECHA ACTUALIZADO</th>
                      <th>ACCIONES</th>
                  </tr>    
              </thead>
              <tbody>

              </tbody>
          </table>
      </div>    
  </div>       
</div>

<!-- Modal Imagen-->
<div class="modal fade" id="modalImagen" tabindex="-1" aria-labelledby="modalImagenLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(54, 105, 199)">
        <h5 class="modal-title" id="modalImagenLabel" style="color: blanchedalmond">Agregar Imagen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <form action="{{route('admin.imagenesagregar')}}" method="POST" id="formImagen" class="needs-validation" enctype="multipart/form-data">    
              {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12 mb-3" style="display:none;">
                    <!-- <div class="col-lg-12 mb-3"> -->
                      <div class="form-group">
                          <label class="formItem" for="opcion" id="opcion_input"> <b>OPCION</b></label>
                          <input type="text" class="form-control" id="opcion" name="opcion">
                      </div> 
                  </div> 
                    <div class="col-lg-12 mb-3" style="display:none;" id="id_imagen">
                      <div class="form-group">
                          <label class="formItem" for="id"> <b>ID</b></label>
                          <input type="text" class="form-control" id="id" name="id" readonly>
                      </div> 
                    </div>   
                    <div class="col-lg-12 mb-3">
                      <div class="form-group">
                          <label class="formItem" for="titulo"> <b>Titulo de Imagen</b></label>
                          <input type="text" class="form-control" id="titulo" name="titulo" required>
                      </div> 
                    </div> 
                    <div class="col-lg-12 mb-3">
                      <div class="form-group">
                        <label for="tipo" class="form-label"><b>Tipo de imagen</b></label>
                        <select id="tipo" name="tipo" class="form-select" required>              
                          <option value="img">img</option>
                          <option value="galeria" selected>galeria</option>
                          <option value="noticias">noticias</option>
                        </select>
                      </div> 
                    </div> 
                    <div class="col-lg-12 mb-3" id="imagen_imagen">
                      <div class="form-group">
                          <label class="formItem" for="imagen"> <b>Seleccionar Imagen</b></label>
                          <input class="form-control form-control" id="imagen" name="imagen" type="file" required>
                      </div> 
                    </div>
                    <div class="col-lg-12 mb-3">
                      <div class="form-group">
                          <label class="formItem" for="descripcion"> <b>Descripcion</b></label>
                          <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                      </div> 
                    </div> 
                  </div>     
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
              </div>
          </form> 
    </div>
  </div>
</div>
 
@endsection

@section('js')
<!-- <script src='{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}'></script> -->
<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src='{{ asset("assets/validity/jquery.validity.min.js") }}'></script>
<script src='{{ asset("assets/validity/jquery.validity.lang.es.js") }}'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>

$(document).ready(function() {

  var id, opcion, titulo;
        opcion = 4;
    
        tablaImagenes = $('#tablaImagenes').DataTable( 
        {
                  // "dom": '<"dt-buttons"Bf><"clear">lirtp',
        "ajax":{            
                        "headers": { 'X-CSRF-TOKEN': $('meta[name="csrf-token_imagenes"]').attr('content') },    
                        "url": "{{route('admin.imageneseliminareditar')}}", 
                        "method": 'post', //usamos el metodo POST
                        "data":{
                            '_token': $('input[name=_token]').val(),
                            opcion:opcion}, //enviamos opcion 1 para que haga un SELECT
                        "dataSrc":""
                    },
        "columns": [
                        { data: "id" },
                        { data: "titulo"},
                        { data: "imagen" },
                        { data: "tipo" }, 
                        { data: "descripcion" },    
                        { data: "created_at" },  
                        { data: "updated_at" },  
                        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='fas fa-edit'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fas fa-trash-alt'></i></button></div></div>"},
                        
                    ],
        responsive: {
            // details: {
                // display: $.fn.dataTable.Responsive.display.modal( {
                //     header: function ( row ) {
                //         var data = row.data();
                //         return data["especialidad"] + ', Medico '+data["nombre_medico"];
                //     }
                // } ),
                // renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                //     tableClass: 'table'
                // } )
            // }
        },
        select: true,
        colReorder: true,
        "autoWidth": false,
         "order": [[ 0, "asc" ]],
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
        });    
        
        $("#btnNuevo").click(function(){        
            fila = $(this).closest("tr");
            opcion = 1; 
            var imagen_imagen = document.getElementById("imagen_imagen");
            imagen_imagen.style.display = "block";

            var id_imagen = document.getElementById("id_imagen");
            id_imagen.style.display = "none";



            $("#formImagen").trigger("reset");
            $("#opcion").val('1');
        });


        var fila; //captura la fila, para editar o eliminar

        //submit para el Alta y Actualización
        $('#formImagen').submit(function(e){                         
                e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
                var form = this;
                // id = $.trim($('#id').val());
                // titulo =  $.trim($('#titulo').val());
                // imagen = $.trim($('#imagen').val());
                // alert(new FormData(form));
                $('#tablaImagenes').DataTable().clear().draw(); 
                $('#modalImagen').modal('hide');

                $.ajax({
                    // headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: $(form).attr("action"),
                    method: $(form).attr('method'),
                    data: new FormData(form), 
                    datatype: "json",   
                    cache:  false,
                    processData:  false,
                    contentType:  false,
                    // data:  {
                    //     '_token': $('input[name=_token]').val(),
                    //     titulo:titulo, id:id, imagen:imagen, opcion:opcion},    

                    success: function(data) {

                        var text = data;
                        var data = JSON.parse(text);

                        tablaImagenes.rows.add(data).draw();
                    },
                });			        										     			
        });

        //Editar        
        $(document).on("click", ".btnEditar", function(){		        
            opcion = 2;//editar
            fila = $(this).closest("tr");	        
            // user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		
            // id = fila.find('td:eq(0)').text();
            if($(this).parents("tr").hasClass('child')){ //vemos si el actual row es child row
                var id = $(this).parents("tr").prev().find('td:eq(0)').text(); //si es asi, nos regresamos al row anterior, es decir, al padre y obtenemos el id
                titulo = $(this).parents("tr").prev().find('td:eq(1)').text();
            } else {
                var id = $(this).closest("tr").find('td:eq(0)').text(); //si no lo es, seguimos capturando el id del actual row
                titulo = fila.find('td:eq(1)').text();
            }



            $("#titulo").val(titulo);
            $("#id").val(id);
            // var imagen_imagen = document.getElementById("imagen_imagen");
            // imagen_imagen.style.display = "none";

            var id_imagen = document.getElementById("id_imagen");
            id_imagen.style.display = "block";

            $("#opcion").val('2');

            $('#modalImagen').modal('show');
            	   
        });

        //Borrar
        $(document).on("click", ".btnBorrar", function(){
            fila = $(this).closest("tr");         
            // cell = $(this).closest("tr").children().first();
            // id2 = cell.text();

            if($(this).parents("tr").hasClass('child')){ //vemos si el actual row es child row
                var id = $(this).parents("tr").prev().find('td:eq(0)').text(); //si es asi, nos regresamos al row anterior, es decir, al padre y obtenemos el id
            } else {
                var id = $(this).closest("tr").find('td:eq(0)').text(); //si no lo es, seguimos capturando el id del actual row
            }

            // alert("Se ha seleccionado el ID: "+id);
            opcion = 3; //eliminar 
            swal({
                  title: "¿Esta Seguro de Eliminar el ID: "+id+"?",
                  // text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: ["Cancelar", "Eliminar"],
                  // buttons: true,
                  // dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token_imagenes"]').attr('content') },
                                        url: "{{route('admin.imageneseliminareditar')}}",
                                        type: "POST",
                                        datatype:"json",      
                                        data:  {
                                            '_token': $('input[name=_token]').val(),
                                            opcion:opcion, id:id},    
                                        success: function() {
                                          tablaImagenes.row(this).remove().draw(); 
                                            swal("Imagen Eliminada con Exito!!!", {
                                            icon: "success",
                                          });                
                                        }
                                    });

                  } else {
                    swal("La imagen no fue Eliminada");
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