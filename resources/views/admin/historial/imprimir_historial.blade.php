<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - Listado del Personal Médico</title>
    <style>
        .content-body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        table.table-content {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
        }

        th.table-header, td.table-data {
            padding: 8px;
            text-align: center;
        }

        th.table-header {
            background-color: #05395d;
            color: white;
        }

        tr.even-row {
            background-color: #f2f2f2;
        }

        tr.row-hover:hover {
            background-color: #ddd;
        }

        .page-number::before {
            content: "Pagina" counter(page);
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            background: #f0f0f0;
            text-align: center;
            line-height: 30px;
            font-size: 12px;
            border-top: 1px solid #ddd;
        }

        .titulo_info{
            text-align: center;
        }

    </style>

</head>
<body  class="content-body">
    <table class="table-content">
        <tr  class="row-hover">
            <td>
                {{ $configuracion ->nombre}} <br>
                {{ $configuracion ->direccion}} <br>
                {{ $configuracion ->telefono}} <br>
                {{ $configuracion ->correo}} <br>
            </td>
            <td width="400px"></td>
            <td>
                <img src="{{ public_path('img/logo_consu.png') }}" style="width: 100px; height: auto;">
            </td>
        </tr>
    </table>

    <h2 class="title"><b><u>Historial Medico</u></b></h2>
    <br>
    <p id="fecha-hora"> 
        Generado el {{ date('d-m-Y') }} a las {{ date('H:i') }}
    </p>

    <div style="border: 1px solid #000000;">
        <h3 class="titulo_info">Informacion del paciente</h3>
        <table class="table-content" border="0" cellpadding="6">
            <tr class="row-hover">
                <td >Paciente: </td>
                <td> {{$paciente->apellido_paterno_paciente." ".$paciente->apellido_materno_paciente." ".$paciente->nombre_paciente}} </td>
            </tr>
            <tr class="row-hover">
                <td><b>CURP: </b></td>
                <td>{{$paciente->curp_paciente}}</td>
            </tr>
            <tr class="row-hover">
                <td><b>Numero de seguro social: </b></td>
                <td>{{$paciente->nss}}</td>
            </tr>
            <tr class="row-hover">
                <td><b>Fecha de nacimiento: </b></td>
                <td>{{$paciente->fecha_nacimiento_paciente}}</td>
            </tr>
    
            <tr class="row-hover">
                <td><b></b></td>
            </tr>
        </table>

    </div>
    <hr>
    <br><br>


    


    <hr>
    <h3>Diagnosticos realizados</h3>
    @foreach ($historiales as $historiale)
    <p>Fecha: {{ $historiale ->fecha_visita}}</p>
    <p>Detalle de la cita: {!! $historiale->detalle!!}</p>
    @endforeach
    

    <div class="footer">
        Impreso por: {{ Auth::user()->name }} <br>
        <small class="page-number"></small>
    </div>

</body>
</html>
