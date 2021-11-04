@extends('template/template')

@section('css')
     <link rel="stylesheet" href="{{ asset('css/guardiaPediatrica.css') }}">
@endsection

@section('content')

    <section class="mx-0 px-0">
        <article class="mx-auto px-0">
            <div class="row mx-0 px-0">
                <img class="img-fluid px-0" src={{ asset("images/img/banner-guardiaPediatrica.png")}} alt="Guardia Pediátrica">
                <div class="d-flex flex-column m-0 p-0">
                    <div class="__titulo-seccion-guardiaPediatrica col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                        <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Guardia Pediátrica</h5>
                    </div>
                </div>
            </div>
        </article>

        <article class="container col-12 mx-auto p-0">
            <div class="col-10 d-flex flex-column flex-sm-column flex-md-column flex-lg-row justify-content-center justify-content-sm-center justify-content-md-center justify-content-between mx-auto p-0 my-4">
                
        
                <div class="col-10 col-sm-10 col-md-6 col-lg-4 px-lg-2 mx-auto mx-sm-auto mx-md-auto mx-lg-2">
                    <img class="container img-fluid mx-auto px-auto mt-2 pt-lg-2" src="{{ asset('images/iconos/horario-guardiaPediatrica.png')}}" alt="Horarios guardia pediatrica">
                                    <div class="container d-flex flex-column justify-content-center mt-3 pt-1">
                                        <div class="px-1 d-flex flex-column">
                                            <p class="col-12 d-inline text-center text-sm-center text-md-center text-lg-start px-auto px-sm-auto px-md-auto px-lg-3 mx-1">Lunes a Viernes de 08 a 20 horas</p>                                
                                        </div>
                                        <div class="px-1 d-flex flex-column">
                                            <p class="col-12 d-inline text-center text-sm-center text-md-center text-lg-start px-auto px-sm-auto px-md-auto px-lg-3 mx-1">Sábados y feriados de 08 a 14 horas.</p>
                                        </div>
                                    </div>
                </div>
        
                <div class="col-10 col-sm-10 col-md-6 col-lg-4 px-lg-2 mx-auto mx-sm-auto mx-md-auto mx-lg-2 mt-3">
                    <img class="container img-fluid mx-auto" src="{{ asset('images/iconos/telefono-guardiaPediatrica.png')}}" alt="Teléfono guardia pediatrica">
                </div>
        
            </div>
            <div class="col-12 d-flex mx-auto my-4">
                <div class="container col-8 __botones-servicios mx-auto px-0 justify-content-center d-flex flex-column flex-sm-column flex-md-row flex-lg-row ">
                    <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="{{route('portaldelpaciente.index')}}"><img class="img-fluid px-0" src="images/botones/portal-paciente-grande.jpg" alt="Portal del paciente"></a>
                    <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/guardia-web-grande.jpg" alt="Guardia web"></a>
                </div>
            </div>
        </article>

    </section>

@endsection

@section('js')
    
@endsection