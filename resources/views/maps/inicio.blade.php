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

      
    </div>
  </div>
  <article class="container mx-auto p-0">
    <div class="row justify-content-center p-0">
        <div class="col-12 d-flex flex-column justify-content-center">

          <div class="col-12 justify-content-center p-0 m-0>
            <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=800&amp;hl=es&amp;q=Cl%C3%ADnica%20Mosconi,%20C.%208%20Leveratto%203419,%20B1923%20Berisso,%20Provincia%20de%20Buenos%20Aires+(clinica%20mosconi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.mapsdirections.info/marcar-radio-circulo-mapa/">Marcar radio en el mapa</a></iframe></div>
          </div>

         </div>
      </div>
</article>
  </section>



@endsection

@section('js')

@endsection
