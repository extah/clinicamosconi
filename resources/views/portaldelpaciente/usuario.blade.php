@extends('template/template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
@endsection

@section('content')

<section>
  <article class="mx-auto px-0">
    <div class="row mx-0 px-0">
        <img class="img-fluid px-0" src={{ asset("images/img/banner-portaldelpaciente.png")}} alt="Imagen de portada de Portal del usuario">
        <div class="d-flex flex-column m-0 p-0">
            <div class="__titulo-seccion-usuario col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Portal del paciente</h5>
            </div>
        </div>
    </div>
</article>
<article class="">
    <div class="col-12 text-end">
        <a href="{{route('portaldelpaciente.cerrarsesion')}}" class="btn btn-lg btn-primary">Cerrar Sesión</a>
    </div>
</article>

<article class="container mx-auto p-0 my-4">
  <div class="row justify-content-center p-1">
      <div class="col-10 d-flex flex-column justify-content-center my-4">
        <div class="col-12 col-sm-12 col-md-7 col-lg-5 __solapa">
            <img class="col-12 img-fluid" src="{{asset ('images/img/solapa-bienvenida.png')}}" alt="Solapa">
        </div>
        <div class="col-12 __botonera-delpaciente d-flex flex-column flex-sm-column flex-md-row flex-lg-row justify-content-cente p-3">
            <a class="col-10 col-sm-10 col-md-4 col-lg-4 nav-link p-0 m-auto" href="{{route('portaldelpaciente.miperfilGet')}}">
                <img class="col-12 img-fluid p-2" src="{{asset('images/botones/perfil-usuario.png')}}" alt="Perfil del usuario">
            </a>
            <a class="col-10 col-sm-10 col-md-4 col-lg-4 nav-link p-0 m-auto" href="">
                <img class="col-12 img-fluid p-2" src="{{asset('images/botones/estudios-usuario.png')}}" alt="Estudios del usuario">
            </a>
            <a class="col-10 col-sm-10 col-md-4 col-lg-4 nav-link p-0 m-auto" href="{{route('portaldelpaciente.nuevoturno')}}">
                <img class="col-12 img-fluid p-2" src="{{asset('images/botones/sacar-turno-usuario.png')}}" alt="Sacar turno">
            </a>
        </div>
        </div>
    </div>
</article>

</section>

@endsection

@section('js')
<script>
    @if ($status_ok)
            toastr.success("{{ $nombre }}", ' {{  $message }} ', {
                // "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-bottom-right",
                "progressBar": true,
                "timeOut": "20000",
            });   
    @endif 
</script>
@endsection