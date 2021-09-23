@extends('template/template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/laclinica.css') }}">
@endsection

@section('content')

    <section class="mx-0 px-0">
        <article class="mx-auto px-0">
            <div class="row mx-0 px-0">
                <img class="img-fluid px-0" src={{ asset("images/img/banner-la-clinica.png")}} alt="Imagen de portada La Clínica">
                <div class="d-flex flex-column m-0 p-0">
                    <div class="__titulo-seccion-laclinica col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                        <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">La Clínica</h5>
                    </div>
                </div>
            </div>
        </article>

        <article class="container col-12 mx-auto p-0">
                    <div class="col-11 col-sm-11 col-md-10 col-lg-8 d-flex flex-column mx-auto p-0 my-4">
                       <p class="lh-base d-flex mx-auto">La Clínica Mosconi se relanza en 2021 por decisión del intendente de Berisso, Fabián Cagliardi, quien atento al contexto de crisis que afectó el funcionamiento de la Cooperativa de Trabajo de la Salud Clínica Mosconi, decidió sumar al Estado para mantener abierto el centro de salud y conservar la fuente de trabajo de más de 115 familias berissenses.</p>
                       <p class="lh-base d-flex mx-auto">Con el horizonte puesto en recuperar la calidad de las prestaciones, se reactivó el servicio de guardia pediátrica y, como hito para la región, se sumó el servicio de Guardia Web que permite asistir por videollamada consultas médicas desde cualquier lugar del mundo, lo que nos posiciona a la vanguardia de los centros de salud de la zona.</p>
                       <p class="lh-base d-flex mx-auto">Nuestra Clínica se integra de 70 profesionales que cubren 23 especialidades, cuenta con dos unidades de traslado y, lo más importante: la calidez humana de nuestras trabajadores y trabajadoras que se ocupan de que quienes nos visitan tengan la mejor experiencia posible.</p>
                       <p class="lh-base d-flex mx-auto">El desafío es seguir creciendo, estar más unidos por la salud, y continuar construyendo una clínica en la que la comunidad de Berisso siga encontrando el mejor servicio médico y la contención y amabilidad que nos caracterizó a lo largo de la historia.</p>
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