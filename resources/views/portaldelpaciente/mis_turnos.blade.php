@extends('template/template')

@section('css')
<link href="{{ asset('/assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>
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
.card-body
{
    border:  solid #12B9B4;
    background-color:#f4faff;
}
.barrapaso-dos {
    border-top: 8px solid #12B9B4;
    padding-top: 10px;
}
</style>
@endsection

@section('content')
<div class="p-0 mb-3">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #04205f;">
    <div class="container-fluid">
      <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Mis Turnos</h5>
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
                  <h4 class="card-title">Mis Turnos</h4>
                </div>                  
            </div>
        </div>
		<div class="form-group">
            <div class="my-2 pb-1 barrapaso-dos" id="barra1"></div>    
        </div>

		<!-- <article class="container col-12 mx-auto p-0">
    		<div class="col-11 col-sm-11 col-md-10 col-lg-10 d-flex flex-column mx-auto p-0 my-4 gap-3">
                 
			</div>	
		</article> -->
        <div class="col-lg-12"> 
            <div class="table-responsive">  
                <table id="tablaTurnos" class="table table-striped table-hover table-bordered display" cellspacing="0" style="width:100%">
                    <meta name="csrf-token_turnos" content="{{ csrf_token() }}">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>ID COMPROBANTE</th>
                            <th>ESPECIALIDAD</th>
                            <th>MEDICO</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>CANCELAR</th>
                        </tr>    
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>    
        </div>       
</div>
@endsection

@section('js')

<script src="{{ asset('assets/moment/moment.min.js') }}"></script>
<script src="{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/assets/formvalidation/0.6.2-dev/js/formValidation.min.js') }}"></script>
<script src="{{ asset('assets/select2/select2.full.js') }}"></script>
<script src='{{ asset("assets/toastr/toastr.min.js") }}'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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

<script>

$(document).ready(function() {

  var id, opcion, titulo;
        opcion = 4;
    
        tablaTurnos = $('#tablaTurnos').DataTable( 
        {
                  // "dom": '<"dt-buttons"Bf><"clear">lirtp',
        "ajax":{            
                        "headers": { 'X-CSRF-TOKEN': $('meta[name="csrf-token_turnos"]').attr('content') },    
                        "url": "{{route('portaldelpaciente.turnoseliminareditar')}}", 
                        "method": 'post', //usamos el metodo POST
                        "data":{
                            '_token': $('input[name=_token]').val(),
                            opcion:opcion}, //enviamos opcion 1 para que haga un SELECT
                        "dataSrc":""
                    },
        "columns": [
                        { data: "id_comprobante" },
                        { data: "especialidad"},
                        { data: "medico" },
                        { data: "fecha" },    
                        { data: "hora" }, 
                        {"defaultContent": "<div class='text-center'></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fas fa-trash-alt'></i> Cancelar</button></div></div>"},
                        
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
                $('#tablaTurnos').DataTable().clear().draw(); 
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

                        tablaTurnos.rows.add(data).draw();
                    },
                });			        										     			
        });

        //Borrar
        $(document).on("click", ".btnBorrar", function(){
            fila = $(this).closest("tr");         
            // cell = $(this).closest("tr").children().first();
            // id2 = cell.text();

            if($(this).parents("tr").hasClass('child')){ //vemos si el actual row es child row
                var id_comprobante = $(this).parents("tr").prev().find('td:eq(0)').text(); //si es asi, nos regresamos al row anterior, es decir, al padre y obtenemos el id
                var fecha = $(this).parents("tr").prev().find('td:eq(3)').text();
                var hora = $(this).parents("tr").prev().find('td:eq(4)').text();
            } else {
                var id_comprobante = $(this).closest("tr").find('td:eq(0)').text(); //si no lo es, seguimos capturando el id del actual row
                var fecha = $(this).closest("tr").find('td:eq(3)').text();
                var hora = $(this).closest("tr").find('td:eq(4)').text();
            }

            // alert("Se ha seleccionado el ID: "+id);
            opcion = 3; //eliminar 
            swal({
                  title: "¿Esta Seguro de Eliminar el Turno con fecha: "+fecha+" y horario: "+ hora +"hs?",
                  // text: "Once deleted, you will not be able to recover this imaginary file!",
                  icon: "warning",
                  buttons: ["Cancelar", "Eliminar"],
                  // buttons: true,
                  // dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token_turnos"]').attr('content') },
                                        url: "{{route('portaldelpaciente.turnoseliminareditar')}}",
                                        type: "POST",
                                        datatype:"json",      
                                        data:  {
                                            '_token': $('input[name=_token]').val(),
                                            opcion:opcion, id_comprobante:id_comprobante},    
                                        success: function() {
                                          tablaTurnos.row(this).remove().draw(); 
                                            swal("Turno Eliminado con Exito!!!", {
                                            icon: "success",
                                          });                
                                        }
                                    });

                  } else {
                    swal("El turno no fue Eliminado");
                  }
                }); 
        }) 
    });                

</script>
@endsection