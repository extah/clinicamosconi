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
      <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d22019.41935009593!2d-57.90886432919502!3d-34.87616631440657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sclinica%20mosconi%20ver%20farmacias%20!5e0!3m2!1ses!2sar!4v1636063393735!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
  </section>



@endsection

@section('js')

@endsection