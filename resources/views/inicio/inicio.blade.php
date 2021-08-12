@extends('template/template')

@section('css')

<style type="text/css">
 .a {
    color: #183a68;
    text-decoration: none;
    background-color: transparent;
}

</style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="justify-content-center" style="text-align:center;">
        <h1 style="color:#183a68">-Clinica Mosconi-</h1>
    </div>
    

    <hr>

    <div class="d-flex justify-content-around">
                    <div class="col-xs-6 text-center" >

                        <a class="btn btn-success btn-circle btn-xl" href="nuevoTurno" role="button"><h2>Nuevo Turno</h2></a>
                        <!-- <h4>Reservá tu turno para realizar tus trámites .</h4> -->
                    </div>
                    <div class="col-xs-6 text-center">
                            <a class="btn btn-danger btn-circle btn-xl" href="cancelarTurno" role="button"><h2>Cancelar Turno</h2></a>
                            <!-- <h4>Cancelá los turnos que hayas sacado.</h4> -->
                    </div>
    </div>

</div>

@endsection

@section('js')
    
@endsection