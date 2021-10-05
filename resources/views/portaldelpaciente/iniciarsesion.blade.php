@extends('template/template')

@section('css')

{{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> --}}
<link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
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
              <form class="__form container my-3 py-4" action="{{route('portaldelpaciente.iniciarsesion')}}" method="post">
                @csrf
                <div class="col-12 d-flex justify-content-start my-2">
                  <h4 class="fw-bolder">Ingresar</h4>
                </div>
                <div class="mb-3">
                  <input type="email" class="__input form-control border-0 border-bottom rounded-0" id="email" name="email" placeholder="Correo electrónico" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <input type="password" class="__input form-control border-0 border-bottom rounded-0" placeholder="Contraseña" id="password" name="password" required>
                </div>
                <div class="col-12 d-flex mb-3">
                  <a class="col-10  text-nowrap text-center mx-auto py-2" href="#" id="olvideContraseña">Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="__btn-submit col-12 btn btn-primary btn-block rounded-0">Ingresar</button>
              </form>
          </div>
      </div>
      <div class="col-10 col-sm-10 col-md-6 col-lg-5 mx-lg-4 d-flex justify-content-center mx-auto mx-sm-auto mx-md-4 mx-lg-4">
          <div class="col-12 justify-content-center mx-auto">
              <form class="__form container my-3 py-4" id="form-register" action="{{route('portaldelpaciente.registrarse')}}" method="post" onsubmit="return validar();">
                @csrf
                <div class="col-12 d-flex justify-content-start my-2">
                  <h4 class="fw-bolder">Registrarse</h4>
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="nombre" name="nombre" placeholder="Nombre" aria-describedby="">
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="apellido" name="apellido" placeholder="Apellido" aria-describedby="">
                </div>
                <div class="mb-3">
                  <input type="email" class="__input form-control border-0 border-bottom rounded-0" id="email" name="email" placeholder="Correo electrónico" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="telefono" name="telefono"  placeholder="Teléfono" aria-describedby="">
                </div>
                <div class="mb-3">
                  <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="dni" name="dni"  placeholder="DNI" aria-describedby="">
                </div>
                <div class="mb-3">
                  <input type="password" class="__input form-control border-0 border-bottom rounded-0" placeholder="Contraseña" id="password" name="password" >
                </div>
                <div class="mb-3">
                  <input type="password" class="__input form-control border-0 border-bottom rounded-0" placeholder="Confirmar Contraseña" id="confirmpassword" name="confirmpassword" >
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" 
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>

<script src="{{asset('js/traducciones.js')}}"></script>
<script src="{{asset('js/validar.js')}}"></script>

@endsection