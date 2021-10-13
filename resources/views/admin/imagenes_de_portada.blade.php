@extends('admin/admin')

@section('css')

{{-- Styles Datatables --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

{{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> --}}

<style>

</style>
@endsection

@section('content')

<section class="container mx-auto p-0 my-4">
  <div class="row justify-content-center p-0 m-0">
    <div class="col-12 d-flex flex-lg-row my-4">
        <article class="col-lg-8 px-2">

            <div class="card">
                <div class="card-body">
                    <table id="banners" class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Imagen</th>
                            <th>Fecha de creación</th>
                            <th>Fecha de modificación</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            {{-- {{dd($banners)}} --}}
        
                            @if (!$banners->isEmpty())
                                
                            @foreach ($banners as $banner)
                                
                            <tr>
                                <th>{{$banner->id}}</th>
                                <td>{{$banner->titulo}}</td>
                                <td><img class="img-fluid" src="{{ url('/images/img/' . $banner->imagen) }}" alt="{{$banner->titulo}}"></td>
                                <td>{{$banner->created_at}}</td>
                                <td >{{$banner->updated_at}}</td>
                                <td><button class="btn btn-primary" type="submit" href="">Editar</button></td>
                                <td><button class="btn btn-danger" type="submit" href="">Eliminar</button></td>
                            </tr>
                            @endforeach
        
                            @else  
                            
        
                        </tbody>
                      </table>
                </div>
            </div>

              <div class="col d-flex justify-content-center">
                <span class="col badge bg-success fw-bolder fs-6 text-center mx-auto py-2 my-2">No hay datos para mostrar</span>
            </div>

            @endif
        </article>
        <article class="col-lg-4">
            <div class="col-12 d-flex justify-content-center mx-auto mx-sm-auto mx-md-1 mx-lg-1 my-0 py-0">
                <div class="col-12 d-flex justify-content-center mx-auto my-0 py-0">
                    <form class="__form container my-0" id="form-register" action="" method="post" onsubmit="return validar();">
                      @csrf
                      <div class="col-12 d-flex justify-content-center my-0">
                        <span class="col badge bg-dark fw-bolder fs-6 text-center text-uppercase">Cargar un banner</span>
                      </div>
                      <div class="col-12 mb-3 mt-2">
                        <input type="text" class="__input form-control border-0 border-bottom rounded-0" id="titulo" name="titulo" placeholder="Título" aria-describedby="">
                      </div>
                      <div class="col-12 mb-3">
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                      </div>
                      <button type="submit" class="__btn-submit col-12 btn btn-primary btn-block rounded-0">Guardar</button>
                    </form>
                </div>    
            </div>
        </article>
    </div>

  </div>
</section>

@endsection

@section('js')

    {{-- JQuery and Datatables --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#banners').DataTable();
        });
    </script>
@endsection