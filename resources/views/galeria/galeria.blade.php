@extends('template/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
@endsection

@section('content')

    <section class="mx-0 px-0">
        <article class="mx-auto px-0">
            <div class="row mx-0 px-0">
                <img class="img-fluid px-0" src={{ asset("images/img/banner-galeria.png")}} alt="Imagen de portada de Galería">
                <div class="d-flex flex-column m-0 p-0">
                    <div class="__titulo-seccion-galeria col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                        <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Galería</h5>
                    </div>
                </div>
            </div>
        </article>

        <article class="container col-12 mx-auto p-0">
                    <div class="col-10 d-flex flex-column flex-sm-column flex-md-column flex-lg-row justify-content-center justify-content-sm-center justify-content-md-center justify-content-between mx-auto p-0 my-4">
                        
                        <div class="photo-gallery">
                            <div class="container">
                                <div class="row photos">
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                        <a href="{{asset('images/galeria/consultorio-gineco.png')}}" title="" data-lightbox="photos">
                                            <img class="img-fluid" src="{{asset('images/galeria/consultorio-gineco.png')}}">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                        <a href="{{asset('images/galeria/diagnostico-imagenes.png')}}" data-lightbox="photos">
                                            <img class="img-fluid" src="{{asset('images/galeria/diagnostico-imagenes.png')}}">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                        <a href="{{asset('images/galeria/laboratorio.png')}}" data-lightbox="photos">
                                            <img class="img-fluid" src="{{asset('images/galeria/laboratorio.png')}}">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                        <a href="{{asset('images/galeria/pediatria.png')}}" data-lightbox="photos">
                                            <img class="img-fluid" src="{{asset('images/galeria/pediatria.png')}}">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                        <a href="{{asset('images/galeria/quirofano.png')}}" data-lightbox="photos">
                                            <img class="img-fluid" src="{{asset('images/galeria/quirofano.png')}}">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                        <a href="{{asset('images/galeria/tomografo.png')}}" title="El primer tomógrafo que tuvo Berisso, funciona en nuestra clínica desde el año 2008." data-lightbox="photos">
                                            <img class="img-fluid" src="{{asset('images/galeria/tomografo.png')}}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 d-flex mx-auto my-4">
                        <div class="container col-8 __botones-servicios mx-auto px-0 d-flex flex-column flex-sm-column flex-md-row flex-lg-row ">
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/portal-paciente-grande.jpg" alt="Portal del paciente"></a>
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-web-grande.jpg" alt="Guardia web"></a>
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-pediatrica-grande.jpg" alt="Guardia pediátrica"></a>
                        </div>
                    </div>
        </article>

    </section>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
@endsection