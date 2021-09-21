@extends('template/template')

@section('css')

            {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> --}}
            {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
<style>

</style>
@endsection

@section('content')
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
<article class="container mx-auto p-0">
{{-- <div class="container"> --}}

    <div class="row justify-content-center p-1">
        <div class="col-md-4 col-sm-2 col-sm-offset-1">
            <div class="col-md-12">
                <h2 style="color: rgba(4, 3, 75, 0.8);text-align:center"><b>Turnos por WhatsApp</b></h2>
                <a class="nav-link text-uppercase" href="https://wa.me/542213621857">
                    <img src="{{asset('images/turnos/whatsapp.png')}}" width="400" height="200" class="d-flex" loading="lazy" alt="guardia-web">
                </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-2 col-sm-offset-1">
            <div class="col-md-12">
                <h2 style="color: rgba(4, 3, 75, 0.8);text-align:center"><b>Turnos por el Portal</b></h2>
                <br>
                <a class="nav-link text-uppercase" href="{{route('portaldelpaciente.index')}}">
                    <img src="{{asset('images/turnos/portal_del_paciente.jpg')}}" width="400" height="140" class="d-flex" loading="lazy" alt="guardia-web">
                  </a>
                {{-- <a class="col-12 col-sm-12 col-md-4 col-lg-4 nav-link d-flex d-inline-block px-1 m-0" href="#"><img class="img-fluid px-0" src="images/botones/portal-paciente-grande.jpg" alt="Portal del paciente"></a> --}}
                {{-- <button type="button" class="btn btn-primary btn-lg">Large button</button> --}}

    </div>


</article>

@endsection

@section('js')

@endsection