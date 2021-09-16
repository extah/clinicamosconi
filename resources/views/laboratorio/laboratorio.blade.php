@extends('template/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/laboratorio.css') }}">
@endsection

@section('content')

    <section class="mx-0 px-0">
        <article class="mx-auto px-0">
            <div class="row mx-0 px-0">
                <img class="img-fluid px-0" src={{ asset("images/img/banner-laboratorio.png")}} alt="Imagen de portada de Laboratorio">
                <div class="d-flex flex-column m-0 p-0">
                    <div class="__titulo-seccion-laboratorio col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                        <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Laboratorio</h5>
                    </div>
                </div>
            </div>
        </article>

        <article class="container col-12 mx-auto p-0">
                    <div class="col-10 d-flex flex-column flex-sm-column flex-md-column flex-lg-row justify-content-center justify-content-sm-center justify-content-md-center justify-content-between mx-auto p-0 my-4">
                        
                        <div class="col-10 col-sm-10 col-md-6 col-lg-4 px-lg-2 mx-auto mx-sm-auto mx-md-auto mx-lg-2 d-flex flex-column">
                            <img class="container img-fluid mx-auto px-auto pt-md-1" src="{{ asset('images/iconos/responsables.png')}}" alt="Responsables">
                            <div class="container d-flex flex-column justify-content-center">
                                <div class="col-12 px-2 d-flex flex-row">
                                    <p class="col-12 d-inline px-3 px-sm-3 px-md-3 px-lg-0 mt-3 pb-1 text-center text-sm-center text-md-center text-lg-start"><i class="fas fa-caret-right d-inline mx-1 my-auto"></i>Dra. Roschich Nora</p>
                                </div>
                                <div class="col-12 px-2 d-flex flex-row">
                                    <p class="col-12 d-inline px-3 px-sm-3 px-md-3 px-lg-0 mt-3 pb-1 text-center text-sm-center text-md-center text-lg-start"><i class="fas fa-caret-right d-inline mx-1 my-auto"></i>Dra. Roselot Andrea</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 col-sm-10 col-md-6 col-lg-4 px-lg-2 mx-auto mx-sm-auto mx-md-auto mx-lg-2">
                            <img class="container img-fluid mx-auto px-auto mt-2 pt-lg-1" src="{{ asset('images/iconos/horarios.png')}}" alt="Horarios">
                            <div class="container d-flex flex-column justify-content-center mt-3 pt-1">
                                <div class="px-1 d-flex flex-column">
                                    <p class="col-12 d-inline text-center text-sm-center text-md-center text-lg-start px-auto px-sm-auto px-md-auto px-lg-3 mx-auto">Lunes a Viernes de 8 a 18 horas y sábados de 8 a 12 horas</p>                                
                                </div>
                                <div class="px-1 d-flex flex-column">
                                    <p class="col-12 d-inline text-center text-sm-center text-md-center text-lg-start px-auto px-sm-auto px-md-auto px-lg-3 mx-auto"><span class="fw-bolder">Extracciones: </span>lunes a viernes de 8 a 10 horas y sábados de 8 a 9 horas</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-10 col-sm-10 col-md-6 col-lg-4 px-lg-2 mx-auto mx-sm-auto mx-md-auto mx-lg-2">
                            <img class="container img-fluid mx-auto px-auto" src="{{ asset('images/iconos/telefono.png')}}" alt="Teléfono">
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
    
@endsection