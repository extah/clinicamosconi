@extends('admin/admin')

@section('css')

{{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> --}}

<style>

</style>
@endsection

@section('content')

<section>
<article class="container mx-auto p-0 my-4">
  <div class="row justify-content-center p-1">
      <div class="col-10 d-flex flex-column justify-content-center">
        <div class="col-12 d-flex justify-content-center">
          <h1 class="col-10 text-center fw-bolder my-3 mx-auto">Iniciar sesión como administrador</h1>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-5 d-flex justify-content-center mx-auto">
          <div class="col-12 justify-content-center mx-auto">
              <form class="__form container my-3 py-4" action="{{route('admin.login')}}" method="post">
                @csrf
                <div class="col-12 d-flex justify-content-center my-2">
                  <h4 class="col fw-bolder text-center bg-secondary  text-white py-2">Ingresar</h4>
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
      </div>
  </div>
</article>

</section>

@endsection

@section('js')

@endsection