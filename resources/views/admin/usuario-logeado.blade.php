@extends('admin/admin')

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('content')

<section class="col-12">
  <article class="col-12 d-flex flex-column justify-content-center">
    <div class="col-12 d-flex justify-content-center">
      <h1 class="col-6 text-center fw-bolder my-3 mx-auto">
        Panel de administración
      </h1>
    </div>
    <div class="">
      <p class="col-8 text-center text-sm-center text-md-start text-lg-start my-3 mx-auto">
        Bienvenido <span class="fw-bolder">usuario</span>, en este panel de administración usted encontrará todo lo necesario para <span class="text-success">agregar</span>, <span class="text-primary">modificar</span> o <span class="text-danger">eliminar</span> elementos del sitio; ante cualquier inconveniente puede enviarnos un email a <span class="fw-bolder">soporteit@berisso.gob.ar</span>
      </p>
    </div>
  </article>
</section>

@endsection

@section('js')
    
@endsection