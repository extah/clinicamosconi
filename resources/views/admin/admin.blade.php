<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Mosconi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary px-3" href="{{route('admin.turnos')}}">Turnos</a>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

<script src="{{asset('assets/DataTables-1.10.25/popper/popper.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

<script src='{{ asset("assets/toastr/toastr.min.js") }}'></script>
<script src='{{ asset("assets/sweetalert/sweet-alert.min.js") }}'></script>

<script src="{{ asset('assets/fontawesome-5.15.3/js/all.js') }}"></script>
<script src="{{asset('js/template.js')}}"></script>

  @yield('js')
</body>
</html>
