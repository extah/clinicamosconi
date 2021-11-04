@extends('template/template')

@section('css')
     {{-- <link rel="stylesheet" href="{{ asset('css/.css') }}"> --}}
@endsection

@section('content')

    <section class="mx-0 px-0">


        <article class="container col-12 d-flex justify-content-center mx-auto p-0 h-100 my-4">
            <img class="col-10 img-fluid mx-auto px-0 my-4" src={{ asset("images/img/sitio-en-construccion.png")}} alt="Guardia Web">
        </article>

    </section>

@endsection

@section('js')
    
@endsection