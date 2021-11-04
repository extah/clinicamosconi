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
          <a class="nav-link d-flex d-inline-block" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"><img src="images/botones/como-llegar-off.png" onMouseOver="this.src='images/botones/como-llegar-on.png'"onMouseOut="this.src='images/botones/como-llegar-off.png'" class="d-flex img-fluid" loading="lazy" alt="Como llegar"></a>
          <a class="nav-link d-flex d-inline-block" href="#"><img src="images/botones/farmacia-off.png" onMouseOver="this.src='images/botones/farmacia-on.png'"onMouseOut="this.src='images/botones/farmacia-off.png'" class="d-flex img-fluid" loading="lazy" alt="farmacia"></a>
        </div>
      </article>
      </div>
    </div>
  </section>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    {{-- <div class="modal-content"> --}}
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <div class="modal-body">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3273.185912295781!2d-57.895407884226124!3d-34.87667757949992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a2e5b5e5ee180f%3A0xdc4b1be8581c2985!2sBaradero%20647%2C%20B1923%20GII%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1636034075758!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    {{-- </div> --}}
  </div>
</div>

@endsection

@section('js')

@endsection