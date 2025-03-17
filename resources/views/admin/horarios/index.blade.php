@extends('layouts.admin')
@section('title')
Horarios    
@endsection
@section('content')
    <h1 class="m-0" style="font-size: 30px;"><b>Horarios</b></h1>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Horarios Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/horarios/create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-square-fill"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body" >
                    <table id="example1" class="table table-primary table-striped table-borderless table-hover" >
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Doctor</b></td>
                                <td><b>Consultorio</b></td>
                                <td><b>Dia</b></td>
                                <td><b>Hora Inicio</b></td>
                                <td><b>Hora Fin</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody>
                                <?php $contador=1; ?>
                                @foreach ($horarios as $horario)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $horario->doctor->nombre_doctor." ".$horario->doctor->apellido_paterno_doctor}}</td>
                                        <td>{{ $horario->consultorio->nombre_consultorio." - ".$horario->consultorio->ubicacion}}</td>
                                        <td>{{ $horario->dia}}</td>
                                        <td>{{ $horario->hora_inicio}}</td>
                                        <td>{{ $horario->hora_fin}}</td>
                                        
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                {{-- <a href="{{url('/admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a> --}}
                                                <a href="{{url('/admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de TOTAL Horarios",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                    "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Horarios",
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
                    
            </div>
            </div>   
        </div>
    
    </div>
    <br>
    <div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Horarios de Medicos</h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="form group">
                        <label>Conmsultorios: </label> 
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
                <script>
                    $('#consultorio_select').on('change',function(){
                        var consultorio_id = $('#consultorio_select').val();
                        //alert(consultorio_id);
                        if (consultorio_id) {
                            $.ajax({
                                url:'/admin/horarios/consultorios/'+consultorio_id,
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
                <div id="consultorio_info">

                </div>
                <hr>
                
            </div>
        </div>
    </div>
</div>
    
@endsection

