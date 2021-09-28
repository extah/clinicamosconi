@extends('template/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
@endsection

@section('content')

    <section class="mx-0 px-0">
        <article class="mx-auto px-0">
            <div class="row mx-0 px-0">
                <img class="img-fluid px-0" src={{ asset("images/img/banner-contacto.png")}} alt="Imagen de portada de Contacto">
                <div class="col-12 d-flex flex-column flex-sm-column flex-md-column flex-lg-row m-0 p-0">
                    <div class="__titulo-seccion-contacto col-12 col-sm-12 col-md-4 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-end my-1">
                        <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Contacto</h5>
                    </div>
                    <div class="__subtitulo col-12 col-sm-12 col-md-12 col-lg-9 d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start mx-md-auto p-auto p-sm-auto p-md-auto px-lg-0">
                        <h6 class="fs-5 fs-md-6 text-center 
                        text-sm-center text-md-center text-lg-start d-inline-block d-flex 
                        mx-auto mx-sm-auto mx-md-auto mx-lg-0 mt-lg-2 p-auto p-sm-auto 
                        py-md-2 px-lg-3">
                        Calle 8 E/ 157 y 158 N°3419 - Berisso - Provincia de Buenos Aires
                    </h6>
                    </div>
                </div>
            </div>
        </article>

        <article class="container col-12 mx-auto p-0">
                    <div class="container d-flex my-4">
                        <div class="col-10 d-flex flex-column flex-sm-column flex-md-row flex-lg-row justify-content-center justify-content-sm-center justify-content-md-center justify-content-between mx-auto p-0 my-4">
                    
                            <div class="col-10 col-sm-10 col-md-6 col-lg-5 d-flex flex-column flex-sm-column flex-md-row flex-lg-row justify-content-center mx-auto mx-sm-auto mx-md-auto mx-lg-2 pt-1">
                                <img class="mx-auto mx-sm-auto mx-md-0 mx-lg-0 mb-3 mb-sm-3" src="{{ asset('images/iconos/logo-celular.png')}}" width="30" height="40" alt="Logo de celular, teléfonos de contacto.">
                                <div class="__numeros-de-telefono d-flex flex-column mx-auto mx-sm-auto mx-md-2 mx-lg-2">
                                    <span class="fw-bolder mb-1">464-5881</span>
                                    <span class="fw-bolder my-1">464-4546</span>
                                    <span class="fw-bolder my-1">464-5866</span>
                                    <span class="fw-bolder my-1">464-5496</span>
                                </div>
                            </div>
    
                            <div class="col-12 col-sm-12 col-md-6 col-lg-5 d-flex flex-column mx-auto mx-sm-auto mx-md-auto mx-lg-2 pt-1">
                                <p class=" __titulo-internos d-flex fs-6 fw-bolder text-center text-sm-center text-md-start text-lg-start mx-auto mx-sm-auto mx-md-0 mx-lg-0 mt-3 mt-sm-3 mt-md-0 mt-lg-0 py-0">Podés marcar los siguientes internos:</p>
                                <span class="__interno text-center text-sm-center text-md-start text-lg-start">Imágenes: 122</span>
                                <span class="__interno text-center text-sm-center text-md-start text-lg-start">Facturación: 131</span>
                                <span class="__interno text-center text-sm-center text-md-start text-lg-start">Internación: 104</span>
                                <span class="__interno text-center text-sm-center text-md-start text-lg-start">Rayos: 119</span>
                                <span class="__interno text-center text-sm-center text-md-start text-lg-start">Internación piso: 120</span>
                                <span class="__interno text-center text-sm-center text-md-start text-lg-start">Laboratorio: 127</span>
                                <span class="__interno text-center text-sm-center text-md-start text-lg-start">Turnos: 105</span>
                            </div>
                            
    
                        </div>
                    </div>
                    <div class="col-12 d-flex mx-auto my-4">
                        <div class="container col-8 __botones-servicios mx-auto px-0 d-flex flex-column flex-sm-column flex-md-row flex-lg-row ">
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="{{route('portaldelpaciente.index')}}"><img class="img-fluid px-0" src="images/botones/portal-paciente-grande.jpg" alt="Portal del paciente"></a>
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-web-grande.jpg" alt="Guardia web"></a>
                            <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-pediatrica-grande.jpg" alt="Guardia pediátrica"></a>
                        </div>
                    </div>
        </article>

    </section>

@endsection

@section('js')
    
@endsection