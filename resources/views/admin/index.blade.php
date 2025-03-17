@extends('layouts.admin')
@section('title')
    Principal
@endsection
@section('content')
    <h1 class="title">Bienvenido {{ Auth::user()->name }} </h1>
    <hr>
    <div class="row">
        
        @can('admin.usuarios.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <a href="{{url('admin/usuarios')}}" class="info-box-icon bg-success">
                        <span ><i class="fa fa-users"></i></span>

                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios</span>
                        <span class="info-box-number">Total: {{$total_usuarios}} </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.secretarias.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <a href="{{url('admin/roles')}}" class="info-box-icon bg-info">
                        <span ><i class="bi bi-person-fill"></i></span>

                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">Secretari@s</span>
                        <span class="info-box-number">Total: {{$total_recepcionistas}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        @can('admin.pacientes.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <a href="{{url('admin/pacientes')}}" class="info-box-icon bg-primary">
                        <span ><i class="bi bi-person-standing"></i></span>

                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">Pacientes</span>
                        <span class="info-box-number">Total: {{$total_pacientes}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan

        



    
        @can('admin.consultorios.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <a href="{{url('admin/consultorios')}}" class="info-box-icon bg-warning">
                        <span ><i class="bi bi-buildings""></i></span>

                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">Consultorios</span>
                        <span class="info-box-number">Total: {{$total_consultorios}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endcan


        @can('admin.doctores.index')
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/productos')}}" class="info-box-icon bg-secondary">
                    <span ><i class="bi bi-heart-pulse-fill"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Doctores</span>
                    <span class="info-box-number">Total: {{$total_doctores}} </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endcan


        @can('admin.horarios.index')
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/horarios')}}" class="info-box-icon bg-danger">
                    <span ><i class="bi bi-alarm-fill"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Horarios</span>
                    <span class="info-box-number">Total: {{$total_horarios}} </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endcan

        @can('admin.horarios.index')
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{url('admin/reservas')}}" class="info-box-icon bg-success">
                    <span ><i class="bi bi-calendar-check"></i></span>

                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Reservas</span>
                    <span class="info-box-number">Total: {{$total_reservas}} </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endcan

        <hr>
        {{-- CALENDARIO DE MEDICOS  --}}
        @can('cargar_datos_consultorios') 

        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Horarios de Médicos</h3>
                        </div>
                        <div class="col-md-6">
                            <label style="text-align: center"><b>Consultorios:</b></label>
                            <div class="form group">
                                
                                <select name="consultorio_id" id="consultorio_select" class="form-control">
                                    <option value="" disabled selected>Seleccione un consultorio..</option>
                                    @foreach ($consultorios as $consultorio)
                                        <option value="{{$consultorio->id}}">{{$consultorio->nombre_consultorio." - ".$consultorio->ubicacion}}</option>
                                    @endforeach
                                </select>
                                @error('consultorio_id')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" >
                    <script>
                        $('#consultorio_select').on('change',function(){
                            var consultorio_id = $('#consultorio_select').val();
                            //alert(consultorio_id);
                            if (consultorio_id) {
                                $.ajax({
                                    url:'/consultorios/'+consultorio_id,
                                    type:'GET',
                                    success: function(data){
                                        //console.log(data);  // Verifica qué datos estás recibiendo
                                        $('#consultorio_info').html(data);
                                    },
                                    error: function(){
                                        alert('Error al obtener los datos del consultorio')
                                    }
                                });
                            }else{
                                $('#consultorio_info').html('');
                            }
                        });
                    </script>
                    <div id="consultorio_info"></div>
                    <hr>
                </div>
            </div>

        </div> {{-- FIN CALENDARIO DE MEDICOS  --}}
       


        {{-- Calendario de RESERVAS  --}}
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                            <h3 class="card-title">Calendario de reservas</h3>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <!-- Selector de lugares -->
                    <div class="form-group">
                        <label>Doctores: </label>
                        <select name="doctor_id" id="barbero_select" class="form-control">
                            <option value="" disabled selected>Seleccione el doctor..</option>
                            @foreach ($doctores as $doctore)
                            <option value="{{$doctore->id}}">{{$doctore->nombre_doctor." ".$doctore->apellido_paterno_doctor." ".$doctore->apellido_materno_doctor}}</option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <small style="color: red">{{$message}}</small>
                        @enderror

                        <script>
                            $('#barbero_select').on('change',function(){
                                var doctor_id = $('#barbero_select').val();

                                //alert(doctor_id);
                                
                                var calendarEl = document.getElementById('calendar');
                                var calendar = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'dayGridMonth',
                                    locale:'es',
                                    events: [
                                        
                                    ],
                                    });
                                    
                            
                                if (doctor_id) {
                                    $.ajax({
                                        url:'/cargar_reserva_barberos/'+doctor_id,
                                        type:'GET',
                                        dataType:'json',
                                        success: function(data){
                                            //console.log(data);  // Verifica qué datos estás recibiendo
                                            //$('#barbero_info').html(data);
                                            calendar.addEventSource(data);
                                        },
                                        error: function(){
                                            alert('Error al obtener los datos del consultorio')
                                        }
                                    });
                                }else{
                                    $('#barbero_info').html('');
                                }
                                calendar.render();
                            });
                        </script>
                    </div>

                    
                    <div class="card-body">

                        <div class="row">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Reservar Cita Medica
                            </button>
                            <a href="{{ route('admin.ver_reservas', Auth::user()->id) }}" class="btn btn-success">
                                <i class="bi bi-calendar-check"></i>
                                Ver las reservas
                            </a>
                            <!-- Modal -->
                            <form action="{{url('/admin/eventos/create')}}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reserva de citas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Doctor:</label>
                                                        <select name="doctor_id" id="" class="form-control" style="text-align: center">
                                                            @foreach ($doctores as $doctore)
                                                                <option value="{{$doctore->id}}">{{$doctore->nombre_doctor.' '.$doctore->apellido_paterno_doctor}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    

                                                    
                                                </div>
    
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" style="text-align: center">Fecha de Reserva:</label>
                                                        <input type="date" class="form-control" name="fecha_reserva" id="fecha_reserva" value="<?php echo date('Y-m-d'); ?>">
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const fechaReservaInput = document.getElementById('fecha_reserva');
                                                        
                                                                // Escuchar el evento de cambio en el campo de fecha de reserva
                                                                fechaReservaInput.addEventListener('change', function() {
                                                                    let selectedDate = this.value; // Obtener la fecha seleccionada
                                                        
                                                                    // Obtener la fecha actual en formato ISO (yyyy-mm-dd)
                                                                    let today = new Date().toISOString().slice(0, 10);
                                                        
                                                                    // Verificar si la fecha seleccionada es anterior a la fecha actual
                                                                    if (selectedDate < today) {
                                                                        // Si es así, establecer la fecha seleccionada en null
                                                                        this.value = null;
                                                                        alert('No puede reservar en esta fecha pasada.');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        
                                                    </div>
                                                </div>
    
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" style="text-align: center">Hora de reserva:</label>
                                                        <input type="time" class="form-control" name="hora_reserva" id="hora_reserva">
                                                        @error('hora_reserva')
                                                            <small style="color: red">{{$message}}</small>
                                                        @enderror
                                                        @if (($message = Session::get('hora_reserva')) && ($icono = Session::get('icono')) )
                        
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    $('#exampleModal').modal('show');
                                                                });
                                                                </script>
                                                            <small style="color: red">{{$message}}</small>
                                                        @endif
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const horaReservaInput = document.getElementById('hora_reserva');
                                                        
                                                                horaReservaInput.addEventListener('change', function() {
                                                                    let selectedTime = this.value; // Obtener el valor de la hora seleccionada
                                                        
                                                                    // Asegurar que solo se capture la parte de la hora
                                                                    if (selectedTime) {
                                                                        selectedTime = selectedTime.split(':'); // Dividir la cadena en horas y minutos
                                                                        selectedTime = selectedTime[0] + ':00'; // Conservar solo la hora, ignorar los minutos
                                                                        this.value = selectedTime; // Establecer la hora modificada en el campo de entrada
                                                                    }
                                                        
                                                                    // Verificar si la hora seleccionada está fuera del rango permitido
                                                                    if (selectedTime < '10:00' || selectedTime > '20:00') {
                                                                        // Si es así, establecer la hora seleccionada en null
                                                                        this.value = null;
                                                                        alert('Por favor, seleccione una hora entre las 08:00 y las 20:00.');
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        
                                                    </div>
                                                </div>
    
    
    
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Registrar</button>

                                        
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>

                    <!-- Calendario -->
                    
                    <div id="calendar"></div>
                </div>

            </div>

        </div>{{-- FIN DE CALENDARIO DE RESERVAS  --}}
        @endcan 


    @if (Auth::check() && Auth::user()->doctor)
    
        <div class="col-md-12">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Calendario de reservas</h3>
                </div>
                <div class="card-body" >
                    
                    <table id="example2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Usuario</b></td>
                                <td><b>Fecha de reserva</b></td>
                                <td><b>Hora de reserva</b></td>
                            </tr>
                        </thead>
                            <tbody>
                                <?php $contador=1; ?>
                                @foreach ($eventos as $evento)
                                    @if (Auth::user()->doctor->id == $evento->doctor_id)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $evento->user->name}}</td>
                                        <td>{{ \Carbon\Carbon::parse($evento ->start)->format('Y-m-d')}}</td>
                                        <td>{{ \Carbon\Carbon::parse($evento ->start)->format('H:i')}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                    </table>
                    <script>
                        $(function () {
                            $("#example2").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de TOTAL Reservas",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                    "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Reservas",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>

                    <hr>
                    
                </div>
            </div>
        </div>
    
    @endif


        

    </div>
    
    
@endsection

