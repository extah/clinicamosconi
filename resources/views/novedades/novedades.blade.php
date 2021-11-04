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
                    
                    @foreach ($noticias as $noticia)
                    
                    <div class="__novedad col-10 col-sm-10 col-md-11 col-lg-12 d-flex flex-column flex-sm-column flex-md-row flex-lg-row mx-auto mb-4">
                        <div class="__novedad-img col-8 col-sm-8 col-md-4 col-lg-3 d-flex my-3 mx-auto mx-lg-2 px-lg-0">
                            <img class="m-auto mx-auto" src="images/noticias/{{$noticia->imagen}}" width="200" height="200" alt="{{$noticia->titulo}}">
                        </div>
                        <div class="__novedad-descrpcion col-10 col-sm-10 col-md-6 col-lg-7 d-flex flex-column align-item-center my-auto mx-auto mx-md-auto">
                            <h6 class="fw-bolder py-1 text-center text-sm-center text-md-start text-lg-start my-2 my-sm-2">{{$noticia->titulo}}</h6>
                            <p class="lh-base d-flex mx-auto">{{$noticia->descripcion}}</p>
                        </div>
                    </div>

                    @endforeach
                        
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
@endsection