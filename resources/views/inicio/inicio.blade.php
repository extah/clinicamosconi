@extends('template/template')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
@endsection

@section('content')

{{-- @dump($banners) --}}

<section class="mx-0 px-0">
    <div class="__content mx-auto px-0">
      <div class="row mx-0 px-0">

        {{-- Carousel Principal Home --}}

        <div class="__contenedor-gradient col-12 p-0 m-0">
          <span class="__gradient-banner d-block"></span>
        </div>

        <div id="carouselExampleDark" class="carousel carousel-dark slide m-0 p-0" data-bs-ride="carousel">
          <div class="d-none">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
          </div>
          <div class="carousel-inner active">

            @foreach ($banners as $banner)
            {{-- @dump($banner->imagen) --}}
            <div class="carousel-item {{$banner == reset($banners) ? active : ""}}" data-bs-interval="{{$banner == reset($banners) ? 7000 : 3500}}">
              <img class="img-fluid px-0" src="{{ asset('images/img/'. $banner->imagen) }}" alt="{{$banner->titulo}}">
              {{-- <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div> --}}
            </div>

            @endforeach

            <div class="carousel-item" data-bs-interval="3500">
              <img class="img-fluid px-0" src="images/img/banner-slider-1.png" alt="Imagen de portada">
              {{-- <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div> --}}
            </div>
            <div class="carousel-item" data-bs-interval="3500">
              <img class="img-fluid px-0" src="images/img/banner-slider-2.png" alt="Imagen de portada">
              {{-- <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div> --}}
            </div>
            <div class="carousel-item" data-bs-interval="3500">
              <img class="img-fluid px-0" src="images/img/banner-slider-3.png" alt="Imagen de portada">
              {{-- <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div> --}}
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        {{-- Fin Carousel Principal Home --}}

        <article class="__botones-portada-home mx-0 px-0 d-flex flex-column flex-sm-column flex-md-row flex-lg-row">
          <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block p-0 m-0" href="{{route('portaldelpaciente.index')}}"><img class="img-fluid px-0" src="images/botones/portal-paciente-grande.jpg" alt="Portal del paciente"></a>
          <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block p-0 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-web-grande.jpg" alt="Guardia web"></a>
          <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block p-0 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-pediatrica-grande.jpg" alt="Guardia pedi&aacutetrica"></a>
        </article>
        <article class="col-12 __noticia-portada-home bg-white d-flex flex-column flex-sm-column flex-md-column flex-lg-row mx-0 px-0">


            {{-- Carousel Noticias --}}

            <div id="carouselExampleDark2" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3500">
                  <div class="__noticia col-12 col-sm-12 col-md-12 col-lg-8 d-block w-100 d-flex flex-column flex-sm-column flex-md-row flex-lg-row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __img-noticia d-flex">
                      <img class="img-fluid d-block w-100 d-flex p-2" src="{{ asset('images/noticias/noticia-novedades-1.png')}}" alt="Cl&iacutenica Renovada">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __descripcion-noticia justify-content-center align-self-center p-2">
                      <h4 class="col-12 d-block d-flex mt-auto">Renovamos la imagen, sumamos servicios y nos unimos m&aacutes </h4>
                      <p class="col-12 d-flex">La Cl&iacutenica Mosconi renov&oacute su imagen e incorpor&oacute servicios para los pacientes, pero conserva el esp&iacuteritu de solidaridad y la fuerza de sus trabajadores para brindar una mejor asistencia de salud a la comunidad de Berisso. En www.clinicamosconi.gob.ar todas las personas podr&aacuten registrarse y tramitar sus turnos de consulta m&eacutedica, acceder al servicio de guardia web por teleconferencia y conocer los d&iacuteas y horarios de atenci&oacuten de todos los especialistas. Tambi&eacuten, encontrar&aacuten un acceso de guardia pedi&aacutetrica para saber qu&eacute pediatra est&aacute cada d&iacutea de la semana y toda la informaci&oacuten relativa al funcionamiento de la Cl&iacutenica.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item"data-bs-interval="3500">
                  <div class="__noticia col-12 col-sm-12 col-md-12 col-lg-8 d-block w-100 d-flex flex-column flex-sm-column flex-md-row flex-lg-row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __img-noticia d-flex">
                      <img class="img-fluid d-block w-100 d-flex p-2" src="{{ asset('images/noticias/noticia-novedades-2.png')}}" alt="Guardia Web">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __descripcion-noticia justify-content-center align-self-center p-2">
                      <h4 class="col-12 d-block d-flex mt-auto">Nuevo servicio de Guardia web</h4>
                      <p class="col-12 d-flex">La Cl&iacutenica Mosconi incorpor&oacute un servicio de guardia web que funcionar&aacute las 24 horas los 7 d&iacuteas de la semana. Con esta incorporaci&oacuten, todas las personas que necesiten realizar una consulta deber&aacuten completar el formulario web, aportar el bono de su obra social, y recibir&aacute un link para ingresar a la videollamada donde los recibir&aacute el profesional a cargo. La nueva Guardia Web, &uacutenica en la regi&oacuten, permitir&aacute a los vecinos de Berisso contar con un servicio de asistencia remota que podr&aacuten utilizar desde cualquier ciudad del mundo y sentirse “como en casa”.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item"data-bs-interval="3500">
                  <div class="__noticia col-12 col-sm-12 col-md-12 col-lg-8 d-block w-100 d-flex flex-column flex-sm-column flex-md-row flex-lg-row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __img-noticia d-flex">
                      <img class="img-fluid d-block w-100 d-flex p-2" src="{{ asset('images/noticias/noticia-novedades-3.png')}}" alt="Incorporamos Diabetolog&iacutea">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __descripcion-noticia justify-content-center align-self-center p-2">
                      <h4 class="col-12 d-block d-flex mt-auto">Incorporamos “Diabetolog&iacutea” a nuestras especialidades</h4>
                      <p class="col-12 d-flex">La Cl&iacutenica Mosconi sum&oacute a Diabetolog&iacutea como &aacuterea de especialidad, con la incorporaci&oacuten del Dr. Mariano Faggiani a su staff de profesionales. El m&eacutedico atender&aacute lo jueves a partir de las 13 h, y se cumple as&iacute con el objetivo de recuperar &aacutereas de asistencia para continuar mejorando la calidad y variedad de prestaciones del servicio de salud de Berisso.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="next">
                <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

            {{-- Fin Carousel Noticias --}}


          <div class="col-12 col-sm-12 col-md-12 col-lg-4 __btn-farmacia-comollegar d-flex flex-column flex-sm-row flex-md-row flex-lg-column justify-content-center justify-content-md-around justify-content-lg-evenly align-items-center mx-0 px-0">
            <a class="nav-link d-flex d-inline-block" href="#"><img src="images/botones/como-llegar-off.png" onMouseOver="this.src='images/botones/como-llegar-on.png'"onMouseOut="this.src='images/botones/como-llegar-off.png'" class="d-flex img-fluid" loading="lazy" alt="Como llegar"></a>
            <a class="nav-link d-flex d-inline-block" href="#"><img src="images/botones/farmacia-off.png" onMouseOver="this.src='images/botones/farmacia-on.png'"onMouseOut="this.src='images/botones/farmacia-off.png'" class="d-flex img-fluid" loading="lazy" alt="farmacia"></a>
          </div>
        </article>
      </div>
    </div>
  </section>

@endsection

@section('js')

@endsection