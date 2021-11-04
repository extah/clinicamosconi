<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Mosconi</title>

    <link href="{{ asset("assets/bootstrap-5.1.0/css/bootstrap.min.css") }}">
    <link href='{{ asset("css/admin.css") }}' rel="stylesheet">
    <!--datables estilo bootstrap 5 CSS-->   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css' rel='stylesheet' type='text/css'>
    
    @yield('css')


</head>
<body>

<main>
  
  <header class="">
    <div class="__navbar container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center __logo px-0 my-auto">
                <a class="navbar-brand d-flex mt-md-2 mx-auto" href="{{route('inicio.index')}}">
                    <img src="{{asset('images/logos/logo_negativo.jpg')}}" width="200" height="70" class="d-inline-block align-top px-0 m-auto mb-3" alt="" loading="lazy">

                  </a>
            </div>
            <nav class="col-12 col-lg-8 __navbar navbar mx-auto">
              <div class="col-12 d-flex flex-column justify-content-center d-inline mx-auto">

                  <!-- MenúMobile -->
                  <nav class="container __navbar-2 col-12 d-block d-flex p-0 my-1 navbar navbar-expand-sm navbar-white bg-white">
                    <div class="__menu-mobile ml-auto container-fluid justify-content-center">
                      <button class="navbar-toggler navbar-light mr-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-between p-0 m-0 mt-sm-2" id="navbarTogglerDemo03">
                        <ul class="col-sm-12 navbar-nav d-flex justify-content-center mb-2 mb-lg-0 mt-md-2 mt-lg-0 ml-lg-0">
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary px-1" href="{{route('admin.imagenes')}}">Imágenes</a>
                          </li>
                          <li class="nav-item dropdown mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              TURNOS
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{route('admin.turnos')}}">Turnos asignados</a></li>
                              <li><a class="dropdown-item" href="{{route('admin.generarturnos')}}">Agregar un turno</a></li>
                              <li><a class="dropdown-item" href="{{route('admin.generarturnos')}}">Generar turnos</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="{{route('admin.cancelarturnos')}}">Cancelar turnos</a></li>
                            </ul>
                            
                          </li>
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary px-1" href="{{-- {{route('')}} --}}">Galería</a>
                          </li>
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link text-nowrap text-uppercase px-3" href="{{route('admin.cerrarsesion')}}">Salir</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <!-- FinMenúMobile -->

              </div>
            </nav>
      </div>
    </div>
</header>

  
@yield('content')


<!-- Footer -->
<footer class="__footer-admin d-none d-md-block">
<p class="text-center my-2"> Copyright <span class="fw-bolder">Clínica Mosconi</span> <span>© Todos los derechos reservados. Municipalidad de Berisso</span></p>
</footer>

</main>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> --}}
<script src="{{ asset("assets/bootstrap-5.1.0/js/popper.min.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/bootstrap.min.js") }}"></script> 

<script src="{{ asset("assets/bootstrap-5.1.0/js/jquery-3.5.1.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/jquery.dataTables.min.js") }}"></script>

<script src="{{asset('assets/DataTables-1.10.25/popper/popper.min.js')}}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/dataTables.bootstrap5.min.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/responsive.bootstrap5.min.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/dataTables.scroller.min.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/dataTables.fixedColumns.min.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/dataTables.colReorder.min.js") }}"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/dataTables.select.min.js") }}"></script>

<script src='{{ asset("assets/toastr/toastr.min.js") }}'></script>
{{-- <script src='{{ asset("assets/sweetalert/sweet-alert.min.js") }}'></script> --}}
<script src="{{ asset("assets/sweetalert/sweetalert.min.js") }}"></script>
<script src="{{ asset('assets/fontawesome-5.15.3/js/all.js') }}"></script>
<script src="{{asset('js/template.js')}}"></script>

  @yield('js')
</body>
</html>
