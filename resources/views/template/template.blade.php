<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Mosconi</title>

    <link href="{{ asset("assets/bootstrap-5.1.0/css/bootstrap.min.css") }}" rel="stylesheet" crossorigin="anonymous">
    <link href='{{ asset("css/template-inicio.css") }}' rel="stylesheet">
    <!--datables estilo bootstrap 5 CSS-->   
    <link rel="stylesheet" href="{{ asset("assets/bootstrap-5.1.0/css/bootstrap-ajax-twitter.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/bootstrap-5.1.0/css/dataTables.bootstrap5.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/bootstrap-5.1.0/css/responsive.bootstrap5.min.css") }}">
    <link href='{{ asset("assets/bootstrap-5.1.0/css/toastr.min.css") }}' rel='stylesheet' type='text/css'>
    @yield('css')


</head>
<body>

<main>

  <header class="bg-white">
    <div class="__navbar container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-center __logo px-0 my-auto">
                <a class="navbar-brand d-flex mt-md-2 mx-auto" href="{{route('inicio.index')}}">
                    <img src="{{asset('images/logos/logo_mosconi.png')}}" width="200" height="70" class="d-inline-block align-top px-0 m-auto" alt="" loading="lazy">
                    
                  </a>
            </div>
            <nav class="col-12 col-lg-8 navbar navbar-light bg-white mx-auto">
              <div class="col-12 d-flex flex-column justify-content-center d-inline mx-auto">
                  <div class="__navbar-1 col-12 d-block d-flex pl-4 my-1">
                      <ul class="col-12 d-flex justify-content-center nav">
                          <li class="nav-item mx-auto">
                            <a class="nav-link text-uppercase" href="#">
                              <img src="{{asset('images/iconos/guardia-web-off.png')}}" width="37" height="37" class="d-flex" loading="lazy" alt="guardia-web">
                              <img src="{{asset('images/iconos/guardia-web-on.png')}}" width="37" height="37" class="d-flex __oculto" loading="lazy" alt="guardia-web">
                              <span class="d-flex mt-1 pt-1 mx-1">Guardia web</span>
                            </a>
                          </li>
                          <li class="nav-item mx-auto">
                            <a class="nav-link text-uppercase" href="#">
                              <img src="{{asset('images/iconos/guardia-pediatrica-off.png')}}" width="37" height="37" class="d-flex" loading="lazy" alt="guardia-pediatrica">
                              <img src="{{asset('images/iconos/guardia-pediatrica-on.png')}}" width="37" height="37" class="d-flex __oculto" loading="lazy" alt="guardia-pediatrica">
                              <span class="d-flex mt-1 pt-1 mx-1">Guardia pediátrica</span>
                            </a>                          </li>
                          <li class="nav-item mx-auto">
                            <a class="nav-link text-uppercase" href="{{route('turnos.index')}}">
                              <img src="{{asset('images/iconos/turnos-off.png')}}" width="36" height="38" class="d-flex" loading="lazy" alt="turnos">
                              <img src="{{asset('images/iconos/turnos-on.png')}}" width="36" height="38" class="d-flex __oculto" loading="lazy" alt="turnos">
                              <span class="d-flex mt-1 pt-1 mx-1">Turnos</span>
                            </a>                          </li>
                          <li class="nav-item mx-auto">
                            <a class="nav-link text-uppercase" href="{{route('contacto.index')}}">
                              <img src="{{asset('images/iconos/contacto-off.png')}}" width="37" height="37" class="d-flex" loading="lazy" alt="contacto">
                              <img src="{{asset('images/iconos/contacto-on.png')}}" width="37" height="37" class="d-flex __oculto" loading="lazy" alt="contacto">
                              <span class="d-flex mt-1 pt-1 mx-1">Contacto</span>
                            </a>                          </li>
                        </ul>
                  </div>

                  <!-- MenúMobile -->
                  <nav class="container __navbar-2 col-12 d-block d-flex p-0 my-1 navbar navbar-expand-sm navbar-white bg-white">
                    <div class="__menu-mobile ml-auto container-fluid justify-content-center">
                      <button class="navbar-toggler mr-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-between p-0 m-0 mt-sm-2" id="navbarTogglerDemo03">
                        <ul class="col-sm-12 navbar-nav d-flex justify-content-center justify-content-sm-center justify-content-md-between justify-content-lg-start mb-2 mb-lg-0 mt-md-2 ml-lg-0">
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary px-1" href="{{route('especialidades.index')}}">Especialidades</a>
                          </li>
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary px-3" href="{{route('laboratorio.index')}}">Laboratorio</a>
                          </li>
                          <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                            <a class="nav-link text-nowrap text-uppercase text-secondary px-1" href="{{route('diagnostico.index')}}">Diagnóstico por Imágenes</a>
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
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="{{route('galeria.index')}}">Galería</a>
            </li>
            <li class="nav-item mx-auto mx-sm-auto mx-md-auto mx-lg-0">
              <a class="nav-link text-nowrap text-white d-flex my-1 py-0" href="{{route('novedades.index')}}">Novedades</a>
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
            <img class="d-flex mx-auto mx-lg-0 mb-lg-4" src="{{asset('images/logos/logo_negativo.jpg')}}" width="220" height="85" alt="logo_mosconi" loading="lazy">
          </div>
    </div>
  </div>
</footer>

</main>
<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/popper.min.js") }}" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/bootstrap.min.js") }}" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script> 
=======
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> --}}
<script src="{{ asset("assets/bootstrap-5.1.0/js/popper.min.js") }}" crossorigin="anonymous"></script>
<script src="{{ asset("assets/bootstrap-5.1.0/js/bootstrap.min.js") }}" crossorigin="anonymous"></script> 
>>>>>>> 6caeddca8c1c177fe450693349639a435289061a

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
<script src='{{ asset("assets/sweetalert/sweet-alert.min.js") }}'></script>

<script src="{{ asset('assets/fontawesome-5.15.3/js/all.js') }}"></script>
<script src="{{asset('js/template.js')}}"></script>

  @yield('js')
</body>
</html>
