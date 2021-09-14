<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Mosconi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href='{{ asset("css/template-inicio.css") }}' rel="stylesheet">
    <!--datables estilo bootstrap 5 CSS-->   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    @yield('css')


</head>
<body>

<main>
  
  <header class="bg-white">
    <div class="__navbar container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center __logo px-0 my-auto">
                <a class="navbar-brand d-flex mt-md-2 mx-auto" href="{{route('inicio.index')}}">
                    <img src="images/logos/logo_mosconi.png" width="200" height="70" class="d-inline-block align-top px-0 m-auto" alt="" loading="lazy">
                    
                  </a>
            </div>
            <nav class="col-12 col-lg-8 navbar navbar-light bg-white mx-auto">
              <div class="col-12 d-flex flex-column justify-content-center d-inline mx-auto">
                  <div class="__navbar-1 col-12 d-block d-flex pl-4 my-1">
                      <ul class="col-12 d-flex justify-content-center nav">
                          <li class="nav-item mx-auto">
                            <a class="nav-link" href="#"><img src="images/iconos/guardia-web-off.png" onMouseOver="this.src='images/iconos/guardia-web-on.png'"onMouseOut="this.src='images/iconos/guardia-web-off.png'" width="140" height="50" class="d-flex" loading="lazy" alt="guardia-web"></a>
                          </li>
                          <li class="nav-item mx-auto">
                            <a class="nav-link" href="#"><img src="images/iconos/guardia-pediatrica-off.png" onMouseOver="this.src='images/iconos/guardia-pediatrica-on.png'"onMouseOut="this.src='images/iconos/guardia-pediatrica-off.png'" width="140" height="50" class="d-flex" loading="lazy" alt="guardia-pediatrica"></a>
                          </li>
                          <li class="nav-item mx-auto">
                            <a class="nav-link" href="#"><img src="images/iconos/turnos-off.png" onMouseOver="this.src='images/iconos/turnos-on.png'"onMouseOut="this.src='images/iconos/turnos-off.png'" width="140" height="50" class="d-flex" loading="lazy" alt="turnos"></a>
                          </li>
                          <li class="nav-item mx-auto">
                            <a class="nav-link" href="#"><img src="images/iconos/contacto-off.png" onMouseOver="this.src='images/iconos/contacto-on.png'"onMouseOut="this.src='images/iconos/contacto-off.png'" width="140" height="50" class="d-flex" loading="lazy" alt="contacto"></a>
                          </li>
                        </ul>
                  </div>

                  <!-- MenúMobile -->
                  <nav class="container __navbar-2 col-12 d-block d-flex p-0 my-1 navbar navbar-expand-sm navbar-white bg-white">
                    <div class="__menu-mobile ml-auto container-fluid justify-content-center">
                      <button class="navbar-toggler mr-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div id="menu" class="collapse navbar-collapse justify-content-between p-0 m-0 mt-sm-2" id="navbarTogglerDemo03">
                        <ul class="col-sm-12 navbar-nav d-flex justify-content-center justify-content-sm-center justify-content-md-between justify-content-lg-start mb-2 mb-lg-0 mt-md-2">
                          <li class="active nav-item mx-auto mx-lg-0 px-lg-0 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary" href="{{route('especialidades.index')}}">Especialidades</a>
                          </li>
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary" href="{{route('laboratorio.index')}}">Laboratorio</a>
                          </li>
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary" href="#">Diagnóstico por Imágenes</a>
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
<footer class="">
  <div class="container">
    <div class="row justify-content-xs-center justify-content-sm-center justify-content-md-center justify-content-lg-between mx-auto mx-sm-auto mx-md-auto pl-lg-3">
        <div class="col-12 col-md-5 col-lg-2 __institucional container-fluid justify-content-center justify-content-xs-center justify-content-sm-center justify-content-md-center justify-content-lg-start mx-auto mx-sm-auto mx-md-auto mx-lg-0 my-4 px-0">
          <div class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start">
            <h5 class="fs-5 text-white text-nowrap fw-bolder d-flex pb-3 p-auto">Institucional</h5>
          </div>
          <ul class="navbar-nav d-flex flex-column justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start mx-auto">
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="{{route('laclinica.index')}}">La clínica</a>
            </li>
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="#">Galería</a>
            </li>
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="#">Novedades</a>
            </li>
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="#">Cómo llegar</a>
            </li>
          </ul>
        </div>

        <div class="col-12 col-md-5 col-lg-3 __contactos justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start mx-sm-auto mx-md-auto mx-lg-0 my-4">
          {{-- <ul class="navbar-nav d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start flex-row mx-md-auto">
            <li class="nav-item mx-2 p-1">
              <a class="nav-link fs-5 text-nowrap text-white d-flex my-1 py-0" href="#"><i class="fab fa-facebook-f"></i></a>
            </li>
            <li class="nav-item mx-2 p-1">
              <a class="nav-link fs-5 text-nowrap text-white d-flex my-1 py-0" href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li class="nav-item mx-2 p-1">
              <a class="nav-link fs-5 text-nowrap text-white d-flex my-1 py-0" href="#"><i class="fab fa-twitter"></i></a>
            </li>
          </ul> --}}
          <div class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start py-1">
              <a class="nav-link fs-6 text-nowrap text-white text-left d-flex my-auto py-0" href="#"><p><i class=" fs-5 fas fa-phone-alt"></i> (221) 464-5881</p></a>
          </div>
          <div class="__direccion d-flex flex-column justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start">
            <span class="nav-link fs-6 text-nowrap text-white text-left d-flex mx-auto mx-sm-auto mx-md-auto mx-lg-0 my-auto py-0">Calle 8 Laveratto 3419</span>
            <span class="nav-link fs-6 text-nowrap text-white text-left d-flex mx-auto mx-sm-auto mx-md-auto mx-lg-0 my-auto py-0">B1923 Berisso</span>
            <span class="nav-link fs-6 text-nowrap text-white text-left d-flex mx-auto mx-sm-auto mx-md-auto mx-lg-0 my-auto py-0">Provincia de Buenos Aires</span>
          </div>
        </div>

        <div class="col-12 col-md-5 col-lg-3 __accesos-rapidos justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start mx-md-auto my-4 px-0">
          <div class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start">
            <h5 class="fs-5 text-white text-nowrap fw-bolder d-flex pb-3 p-auto">Accesos rápidos</h5>
          </div>
          <ul class="navbar-nav flex-column justify-content-center justify-content-sm-center justify-content-md-center justify-content-start mx-auto">
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0 d-flex">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="#">Municipalidad de Berisso</a>
            </li>
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0 d-flex">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="#">Ministerio de Salud de la Prov. de Bs. As.</a>
            </li>
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0 d-flex">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="#">Ministerio de Salud de la Nación </a>
            </li>
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0 d-flex">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="{{route('cooperativa.index')}}">Cooperativa Mosconi</a>
            </li>
          </ul>
        </div>

          <div class="col-12 col-md-5 col-lg-3 d-flex justify-content-md-center justify-content-lg-end __logo-footer mx-auto mx-md-auto mx-lg-0 my-4 my-sm-4 my-md-auto my-lg-0 align-items-lg-end">
            <img class="d-flex mx-auto mx-lg-0 mb-lg-4" src="images/logos/logo_negativo.jpg" width="220" height="85" alt="logo_mosconi" loading="lazy">
          </div>
    </div>
  </div>
</footer>

</main>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.0.5/js/dataTables.scroller.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

<script src="{{ asset('assets/fontawesome-5.15.3/js/all.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{asset('js/template.js')}}"></script>

  @yield('js')
</body>
</html>
