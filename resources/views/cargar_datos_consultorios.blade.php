<h3><center>Horario de Atencion del consultorio de {{$consultorio->nombre_consultorio}}</center></h3>
<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr style="text-align: center">
            <th>Hora</th>
            <th>LUNES</th>
            <th>MARTES</th>
            <th>MIERCOLES</th>
            <th>JUEVES</th>
            <th>VIERNES</th>
            <th>SABADO</th>
        </tr>
        
        <hr>
    </thead>
    <tbody>
        @php
            $horas =['10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00','13:00:00 - 14:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00','18:00:00 - 19:00:00','19:00:00 - 20:00:00'];
            $diasSemana=['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO'];
        @endphp
        @foreach ($horas as $hora)
        @php
            list($hora_inicio, $hora_fin) = explode(' - ', $hora);
        @endphp
    <tr style="text-align: center">
        <td>{{ $hora }}</td>
        @foreach ($diasSemana as $dia)
            @php
                $nombre_barbero = ''; // Inicializa un arreglo para recopilar nombres de barberos
                foreach ($horarios as $horario) {
                    if (strtoupper($horario->dia) == $dia && 
                        $hora_inicio >= $horario->hora_inicio && 
                        $hora_fin <= $horario->hora_fin) {
                        $nombre_barbero= $horario->doctor->nombre_doctor.' '.$horario->doctor->apellido_paterno_doctor; // Recopila nombres de barberos
                        break;
                    }
                }
            @endphp
            <td>{{$nombre_barbero}}</td> <!-- Une los nombres con una coma -->
        @endforeach
    </tr>
    @endforeach
    

    </tbody>
    
</table>