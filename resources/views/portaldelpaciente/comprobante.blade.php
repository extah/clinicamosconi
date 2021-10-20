<!DOCTYPE html>
<html lang="en">
  <head>
    
    {{-- <link rel="shortcut icon" href="{{ asset('images/logos/logo_mosconi.png') }}"> --}}
    
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPROBANTE DE TURNO</title>
    
    <link href="css/pdf.css" rel="stylesheet">
     
  </head>
  <body>

    <div class="row">
        <div class="container mt-5">    
            <div style="margin-left: -20px; margin-top: 0px;">
                <img src="images/logos/logo_mosconi.png" width="200" height="70" class="d-inline-block align-top px-0 m-auto" alt="" loading="lazy">
            </div>

        </div>

        <div class="container">
            
            <div style="padding: 0; top: 55px; left: 35; position: absolute; ">
                <H3><b>COMPROBANTE DE TURNO PARA LA CLINICA MOSCONI DE BERISSO</b></H3>
            </div>
    
            <div style="padding: 5; top: 100px; left: 0; position: absolute; ">
                <table style=" width: 90%; border: solid; margin-left: 40px">
                <tr style="border: solid;">
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        N° COMPROBANTE:
                    </td>
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->id_comprobante }}</b>
                    </td>
                </tr>
                {{-- <tr style="border: solid;">
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        ORDEN TURNO:
                    </td>
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->nro_turno }}</b>
                    </td>
                </tr> --}}
                <tr style="border: solid;">
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        FECHA:
                    </td>
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->fecha }}</b>
                    </td>
                </tr>
                <tr >
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        HORA:
                    </td>
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->hora }} </b>
                    </td>
                </tr>
                <tr >
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        ESPECIALIDAD:
                    </td>
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->especialidad }}</b>
                    </td>
                </tr>
                <tr >
                    <td style="border: solid; width: 50%; padding: 3; text-align: left;">                    
                        NOMBRE Y APELLIDO:
                    </td>
                    <td style="border: solid; width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->nombrecompleto }}</b>
                    </td>
                </tr>
                <tr >
                    <td style="border: solid; width: 50%; padding: 3; text-align: left;">                    
                        N° Documento: 
                    </td>
                    <td style="border: solid; width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->nro_doc }}</b>
                    </td>
                </tr>
                <tr >
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        EMAIL:
                    </td>
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->email }} </b>
                    </td>
                </tr>
                <tr >
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        TELEFONO:
                    </td>
                    <td style=" border: solid;width: 50%; padding: 3; text-align: left;">                    
                        <b>{{ $turno[0]->telefono }} </b>
                    </td>
                </tr>
                </table > 
            </div>
            <hr style=" border:1px dotted ; width:680px;   position: absolute; top: 350 px; left: 0" />
            <div style="padding: 0; top: 360px; left: 0; position: absolute; text-align: center;">
                <H5><b>La Clinica Mosconi de Berisso se reserva el derecho de reprogramar los turnos otorgados ante la imposibilidad del cumplimiento de los mismos por causas que afecten su funcionamiento</b></H5>
            </div>
        </div>     
    </div>    
    
  </body>
 

</html>

                         