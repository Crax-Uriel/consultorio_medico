<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - Listado del Personal Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #05395d;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }

        .page-number::before{
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

        
    </style>

</head>
<body>
    <table style="font-size: 8pt">
        <tr style="text-align: center">
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

    <h2><b><u>Listado del Personal Médico</u></b></h2>
    <br>
    <p id="fecha-hora"> 
        Generado el {{ date('d-m-Y') }} a las {{ date('H:i') }}
        </p>

    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Nombre(s) y Apellidos</th>
                <th>CURP</th>
                <th>Teléfono</th>
                <th>Cédula Médica</th>
                <th>Especialidad</th>
                <th>Correo Electrónico</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador=1; ?>
            @foreach ($doctores as $doctore)
                <tr>
                    <td>{{ $contador++ }}</td>
                    <td>{{ $doctore->nombre_doctor }} {{ $doctore->apellido_paterno_doctor }} {{ $doctore->apellido_materno_doctor }}</td>
                    <td>{{ $doctore->curp }}</td>
                    <td>{{ $doctore->celular }}</td>
                    <td>{{ $doctore->licencia_medica }}</td>
                    <td>{{ $doctore->especialidad }}</td>
                    <td>{{ $doctore->user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        Impreso por: {{ Auth::user()->name }} <br>
        <small class="page-number"></small>

    </div>
   
</body>
</html>
