@extends('template/template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/turnos.css') }}">
@endsection

@section('content')

<section>
  <article class="mx-auto px-0">
    <div class="row mx-0 px-0">
        <img class="img-fluid px-0" src={{ asset("images/img/banner-turnos.png")}} alt="Imagen de portada de Turnos">
        <div class="d-flex flex-column m-0 p-0">
            <div class="__titulo-seccion-turnos col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Turnos</h5>
            </div>
        </div>
    </div>
</article>

<article class="container mx-auto p-0 my-4">
  <div class="row justify-content-center p-1">
      <div class="col-10 d-flex flex-column justify-content-center my-4">
        <div class="col-12 __botonera-turnos d-flex flex-column flex-sm-column flex-md-row flex-lg-row justify-content-cente p-3">
            <a class="col-11 col-sm-11 col-md-6 col-lg-5 nav-link p-0 m-auto" href="https://wa.me/542213621857">
                <img class="col-12 img-fluid p-2" src="{{asset('images/botones/turno-whatsapp.png')}}" alt="Turnos Whatsapp">
            </a>
            <a class="col-11 col-sm-11 col-md-6 col-lg-5 nav-link p-0 m-auto" href="{{route('portaldelpaciente.index')}}">
                <img class="col-12 img-fluid p-2" src="{{asset('images/botones/turno-portal-del-paciente.png')}}" alt="Turnos portal del paciente">
            </a>
        </div>
        </div>
    </div>
</article>

</section>

@endsection

@section('js')

@endsection