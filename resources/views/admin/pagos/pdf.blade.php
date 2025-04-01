<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de pago</title>
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
            text-align: left;
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


        .firma {
        display: inline-block;
        width: 200px; /* Ajusta el ancho de la línea */
        border-top: 2px solid black; /* Línea superior */
        text-align: center;
        padding-top: 5px; /* Espacio entre la línea y el texto */
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

    <h2 class="title"><b><u>Comprobante de pago - Original</u></b></h2>
    <div style="text-align: center" >
        <img  src="data:image/png;base64,{{$qrCodeBase64}}" alt="Codigoqr" width="80px">
    </div>
    <p id="fecha-hora"> 
        Generado el {{ date('d-m-Y') }} a las {{ date('H:i') }}
    </p>

    <div style="border: 1px solid #000000;">
        <table class="table-content" border="0" cellpadding="6">
            <tr class="row-hover">
                <td >Sr (): </td>
                <td>{{$pago->paciente->apellido_paterno_paciente." ".$pago->paciente->apellido_materno_paciente." ".$pago->paciente->nombre_paciente}}</td>
                <td >Fecha: </td>
                <td>{{$pago->fecha_pago}}</td>

                
            </tr>
        
            <tr class="row-hover">
                <td >Monto: </td>
                <td>{{$pago->monto}}</td>
            </tr>

            <tr class="row-hover">
                <td >Consultorio de especialidad: </td>
                <td>{{$pago->doctor->especialidad}}</td>
            </tr>

            <tr class="row-hover">
                <td>Atentido por el doctor: </td>
                <td>{{ $pago->doctor ->nombre_doctor}} {{ $pago->doctor ->apellido_paterno_doctor}} {{ $pago->doctor ->apellido_materno_doctor}}</td>
            </tr>
           
    
            <tr class="row-hover">
                <td><b></b></td>
            </tr>
        </table>
    </div>
    <hr><br><br><br>
    <table class="table-content" border="0" cellpadding="6">
        <tr style="text-align: center">
            <td><span class="firma">Secretaria <br> Miche Plata</span></td>
            <td><span class="firma">Recibí: <br> {{$pago->paciente->apellido_paterno_paciente." ".$pago->paciente->apellido_materno_paciente." ".$pago->paciente->nombre_paciente}}</span></td>
        </tr>

    </table>
    <br>
   
    <p style="text-align: center">--------------------------------------------------------------------------------------------------------------------------</p>


    <h2 class="title"><b><u>Comprobante de pago - Copia</u></b></h2>
    <div style="text-align: center" >
        <img src="data:image/png;base64,{{$qrCodeBase64}}" alt="Codigoqr" width="80px">
    </div>
    <p id="fecha-hora"> 
        Generado el {{ date('d-m-Y') }} a las {{ date('H:i') }}
    </p>

    <div style="border: 1px solid #000000;">
        <table class="table-content" border="0" cellpadding="6">
            <tr class="row-hover">
                <td >Sr (): </td>
                <td>{{$pago->paciente->apellido_paterno_paciente." ".$pago->paciente->apellido_materno_paciente." ".$pago->paciente->nombre_paciente}}</td>
                <td >Fecha: </td>
                <td>{{$pago->fecha_pago}}</td>

                
            </tr>
        
            <tr class="row-hover">
                <td >Monto: </td>
                <td>{{$pago->monto}}</td>
                
            </tr>

            <tr class="row-hover">
                <td >Consultorio de especialidad: </td>
                <td>{{$pago->doctor->especialidad}}</td>
            </tr>

            <tr class="row-hover">
                <td>Atentido por el doctor: </td>
                <td>{{ $pago->doctor ->nombre_doctor}} {{ $pago->doctor ->apellido_paterno_doctor}} {{ $pago->doctor ->apellido_materno_doctor}}</td>
            </tr>
    
            <tr class="row-hover">
                <td><b></b></td>
            </tr>
        </table>
    </div>
    <hr><br><br><br>
    <table class="table-content" border="0" cellpadding="6">
        <tr style="text-align: center">
            <td><span class="firma">Secretaria <br> Miche Plata</span></td>
            <td><span class="firma">Recibí: <br> {{$pago->paciente->apellido_paterno_paciente." ".$pago->paciente->apellido_materno_paciente." ".$pago->paciente->nombre_paciente}}</span></td>
        </tr>

    </table>
    <br>
    

    



    <div class="footer">
        Impreso por: {{ Auth::user()->name }} <br>
        <small class="page-number"></small>
    </div>

</body>
</html>
