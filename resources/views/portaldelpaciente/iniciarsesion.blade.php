@extends('template/template')

@section('css')

{{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> --}}
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<style>

</style>
@endsection

@section('content')

<section>
  <article class="mx-auto px-0">
    <div class="row mx-0 px-0">
        <img class="img-fluid px-0" src={{ asset("images/img/banner-portaldelpaciente.png")}} alt="Imagen de portada de Portal del Paciente">
        <div class="d-flex flex-column m-0 p-0">
            <div class="__titulo-seccion-portaldelpaciente col-12 col-sm-12 col-md-6 col-lg-4 d-block d-flex justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end my-1">
                <h5  class="__titulo fs-5 text-uppercase text-white pl-4 py-1 my-auto">Portal del paciente</h5>
            </div>
        </div>
    </div>
</article>

<article class="container mx-auto p-0 my-4">
  <div class="row justify-content-center p-1">
      <div class="col-10 d-flex flex-column flex-sm-column flex-md-row flex-lg-row justify-content-center">
        <div class="col-10 col-sm-10 col-md-6 col-lg-5 mx-lg-4 d-flex justify-content-center mx-auto mx-sm-auto mx-md-4 mx-lg-4">
          <div class="col-12 justify-content-center mx-auto">
              <h6 class="__title-form col-12 text-center text-uppercase fw-bolder">Si ya se registró, ingrese su email y contraseña</h6>
              {{-- <form class="__form container my-3 py-4" method="post" action="{{ url('administrador/menu')  }}" data-toggle="validator" role="form"> --}}
              <form class="__form container my-3 py-4">  
                <div class="col-12 d-flex justify-content-start my-2">
                  <h4 class="fw-bolder">Ingresar</h4>
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="exampleInputName1" placeholder="Nombre y Apellido" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <input type="email" class="__input form-control border-0 border-bottom rounded-0" id="exampleInputEmail1" placeholder="Correo electrónico" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <input type="password" class="__input form-control border-0 border-bottom rounded-0" placeholder="Contraseña" id="exampleInputPassword1">
                </div>
                <button type="submit" class="__btn-submit col-12 btn btn-primary btn-block rounded-0">Ingresar</button>
              </form>
          </div>
      </div>
      <div class="col-10 col-sm-10 col-md-6 col-lg-5 mx-lg-4 d-flex justify-content-center mx-auto mx-sm-auto mx-md-4 mx-lg-4">
          <div class="col-12 justify-content-center mx-auto">
              <h6 class="__title-form col-12 text-center text-uppercase fw-bolder">Para registrarse, complete los siguientes campos</h6>
              <form class="__form container my-3 py-4">
                <div class="col-12 d-flex justify-content-start my-2">
                  <h4 class="fw-bolder">Registrarse</h4>
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="exampleInputName1" placeholder="Nombre y Apellido" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <input type="email" class="__input form-control border-0 border-bottom rounded-0" id="exampleInputEmail1" placeholder="Correo electrónico" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="exampleInputTel1" placeholder="Teléfono" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="exampleInputDNI1" placeholder="DNI" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <input type="password" class="__input form-control border-0 border-bottom rounded-0" placeholder="Contraseña" id="exampleInputPassword1">
                </div>
                <button type="submit" class="__btn-submit col-12 btn btn-primary btn-block rounded-0">Registrarse</button>
              </form>
          </div>    
      </div>
      </div>
  </div>
</article>

</section>

@endsection

@section('js')

@endsection