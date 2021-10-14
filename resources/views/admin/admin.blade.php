<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Clínica Mosconi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href='{{ asset("css/template-inicio.css") }}' rel="stylesheet">


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

                      <!-- MenúMobile -->
                      <nav class="container __navbar-2 col-12 d-block d-flex p-0 my-1 navbar navbar-expand-sm navbar-white bg-white">
                        <div class="__menu-mobile ml-auto container-fluid justify-content-center">
                          <button class="navbar-toggler mr-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse justify-content-between p-0 m-0 mt-sm-2" id="navbarTogglerDemo03">
                            <ul class="col-sm-12 navbar-nav d-flex justify-content-center mb-2 mb-lg-0 mt-md-2 ml-lg-0">
                              <li class="nav-item mx-auto mx-lg-0 px-lg-0 mt-4 mt-sm-0 mt-md-0 mt-lg-0">
                                <a class="nav-link text-nowrap text-uppercase text-secondary px-1" href="{{-- {{route('')}} --}}">Imágenes de portada</a>
                              </li>
                              <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                                <a class="nav-link text-nowrap text-uppercase text-secondary px-3" href="{{-- {{route('')}} --}}">Noticias</a>
                              </li>
                              <li class="nav-item mx-auto mx-lg-0 px-lg-0">
                                <a class="nav-link text-nowrap text-uppercase text-secondary px-1" href="{{-- {{route('')}} --}}">Galería</a>
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


</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</body>
</html>