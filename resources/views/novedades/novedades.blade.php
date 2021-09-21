@extends('template/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/novedades.css') }}">
@endsection

@section('content')

    <section class="mx-0 px-0">
        <article class="mx-auto px-0">
            <div class="row mx-0 px-0">
                <img class="img-fluid px-0" src={{ asset("images/img/banner-novedades.png")}} alt="Imagen de portada de Novedades">
                <div class="d-flex flex-column m-0 p-0">
                    <div class="__titulo-seccion-novedades col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                        <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Novedades</h5>
                    </div>
                </div>
            </div>
        </article>

        <article class="container col-12 mx-auto p-0">
                <div class="col-12 d-flex flex-column mx-auto p-0 my-4">
                        
                    <div class="__novedad col-10 col-sm-10 col-md-11 col-lg-12 d-flex flex-column flex-sm-column flex-md-row flex-lg-row mx-auto mb-4">
                        <div class="__novedad-img col-8 col-sm-8 col-md-4 col-lg-3 d-flex my-3 mx-auto mx-lg-2 px-lg-0">
                            <img class="m-auto mx-auto" src="{{asset('images/noticias/noticia-novedades-1.png')}}" width="200" height="200" alt="Renovamos la imagen, sumamos servicios y nos unimos más.">
                        </div>
                        <div class="__novedad-descrpcion col-10 col-sm-10 col-md-6 col-lg-7 d-flex flex-column align-item-center my-auto mx-auto mx-md-auto">
                            <h6 class="fw-bolder py-1 text-center text-sm-center text-md-start text-lg-start my-2 my-sm-2">Renovamos la imagen, sumamos servicios y nos unimos más.</h6>
                            <p class="lh-base d-flex mx-auto">La Clínica Mosconi renovó su imagen e incorporó servicios para los pacientes, pero conserva el espíritu de solidaridad y la fuerza de sus trabajadores para brindar una mejor asistencia de salud a la comunidad de Berisso. En www.clinicamosconi.gob.ar todas las personas podrán registrarse y tramitar sus turnos de consulta médica, acceder al servicio de guardia web por teleconferencia y conocer los días y horarios de atención de todos los especialistas. También, encontrarán un acceso de guardia pediátrica para saber qué pediatra está cada día de la semana y toda la información relativa al funcionamiento de la Clínica.</p>
                        </div>
                    </div>

                    <div class="__novedad col-10 col-sm-10 col-md-11 col-lg-12 d-flex flex-column flex-sm-column flex-md-row flex-lg-row mx-auto mb-4">
                        <div class="__novedad-img col-8 col-sm-8 col-md-4 col-lg-3 d-flex my-3 mx-auto mx-lg-2 px-lg-0">
                            <img class="m-auto mx-auto" src="{{asset('images/noticias/noticia-novedades-2.png')}}" width="200" height="200" alt="Nuevo servicio de Guardia web">
                        </div>
                        <div class="__novedad-descrpcion col-10 col-sm-10 col-md-6 col-lg-7 d-flex flex-column align-item-center my-auto mx-auto mx-md-auto">
                            <h6 class="fw-bolder py-1 text-center text-sm-center text-md-start text-lg-start my-2 my-sm-2">Nuevo servicio de Guardia web</h6>
                            <p class="lh-base d-flex mx-auto">La Clínica Mosconi incorporó un servicio de guardia web que funcionará las 24 horas los 7 días de la semana. Con esta incorporación, todas las personas que necesiten realizar una consulta deberán completar el formulario web, aportar el bono de su obra social, y recibirá un link para ingresar a la videollamada donde los recibirá el profesional a cargo. La nueva Guardia Web, única en la región, permitirá a los vecinos de Berisso contar con un servicio de asistencia remota que podrán utilizar desde cualquier ciudad del mundo y sentirse “como en casa”.</p>
                        </div>
                    </div>

                    <div class="__novedad col-10 col-sm-10 col-md-11 col-lg-12 d-flex flex-column flex-sm-column flex-md-row flex-lg-row mx-auto mb-4">
                        <div class="__novedad-img col-8 col-sm-8 col-md-4 col-lg-3 d-flex my-3 mx-auto mx-lg-2 px-lg-0">
                            <img class="m-auto mx-auto" src="{{asset('images/noticias/noticia-novedades-3.png')}}" width="200" height="200" alt="Incorporamos “Diabetología” a nuestras especialidades">
                        </div>
                        <div class="__novedad-descrpcion col-10 col-sm-10 col-md-6 col-lg-7 d-flex flex-column align-item-center my-auto mx-auto mx-md-auto">
                            <h6 class="fw-bolder py-1 text-center text-sm-center text-md-start text-lg-start my-2 my-sm-2">Incorporamos “Diabetología” a nuestras especialidades</h6>
                            <p class="lh-base d-flex mx-auto">La Clínica Mosconi sumó a Diabetología como área de especialidad, con la incorporación del Dr. Mariano Faggiani a su staff de profesionales. El médico atenderá lo jueves a partir de las 13 h, y se cumple así con el objetivo de recuperar áreas de asistencia para continuar mejorando la calidad y variedad de prestaciones del servicio de salud de Berisso.</p>
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