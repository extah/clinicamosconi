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

            <div class="d-none">{{$itera=0}}</div>  
            @foreach ($banners as $banner)

            @if ($banner->tipo == 'img')
            
            <div class="carousel-item {{ $itera == 0 ? 'active' : ''}}" data-bs-interval="{{ $itera == 0 ? '7000' : '3500'}}">
              <img class="img-fluid px-0" src="images/img/{{$banner->imagen}}" alt="{{$banner->titulo}}">
              {{-- <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div> --}}
            </div>

            <div class="d-none">{{$itera++}}</div>
            @endif

            @endforeach
            
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
          <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block p-0 m-0" href="{{route('proximamente.index')}}"><img class="img-fluid px-0" src="images/botones/guardia-web-grande.jpg" alt="Guardia web"></a>
          <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block p-0 m-0" href="{{route('proximamente.index')}}"><img class="img-fluid px-0" src="images/botones/guardia-pediatrica-grande.jpg" alt="Guardia pedi&aacutetrica"></a>
        </article>
        <article class="col-12 __noticia-portada-home bg-white d-flex flex-column flex-sm-column flex-md-column flex-lg-row mx-0 px-0">


          {{-- Carousel Noticias --}}

          <div id="carouselExampleDark2" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <div class="d-none">{{$i=0}}</div>  
              @foreach ($banners as $banner)
                  
                @if ( $banner->tipo == 'noticias' )
                    
                <div class="carousel-item {{ $i==0 ? 'active' : ''}}" data-bs-interval="3500">
                  <div class="__noticia col-12 col-sm-12 col-md-12 col-lg-8 d-block w-100 d-flex flex-column flex-sm-column flex-md-row flex-lg-row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __img-noticia d-flex">
                      <img class="img-fluid d-block w-100 d-flex p-2" src="images/noticias/{{$banner->imagen}}" alt="{{$banner->titulo}}">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 __descripcion-noticia justify-content-center align-self-center p-2">
                      <h4 class="col-12 d-block d-flex mt-auto">{{$banner->titulo}}</h4>
                      <p class="col-12 d-flex">{{$banner->descripcion}}
                      </p>
                    </div>
                  </div>
                </div>

                <div class="d-none">{{$i++}}</div>

                @endif

              @endforeach  
              
              
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