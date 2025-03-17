@extends('layouts.admin')
@section('title')
    Pacientes
@endsection
@section('content')
    <h1 class="m-0" style="font-size: 30px;"> <b>Pacientes</b></h1>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pacientes Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/pacientes/create')}}" class="btn btn-secondary" style="background-color: #8fc9ff">
                            <i class="bi bi-plus-square-fill"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <table id="example1" class="table table-primary table-striped table-borderless table-hover" >
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Nombre(s) y Apellidos</b></td>
                                <td><b>CURP</b></td>
                                <td><b>Celular</b></td>
                                <td><b>Correo Electronico</b></td>
                                <td><b>Tipo de sangre</b></td>
                                <td><b>Alergias</b></td>
                                <td><b>observaciones</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody style="text-align: center">
                                <?php $contador=1; ?>
                                @foreach ($pacientes as $paciente)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $paciente ->nombre_paciente}} {{ $paciente ->apellido_paterno_paciente}} {{ $paciente ->apellido_materno_paciente}}</td>
                                        <td>{{ $paciente ->curp_paciente}}</td>
                                        <td>{{ $paciente ->celular_paciente}}</td>
                                        <td>{{ $paciente ->correo_paciente}}</td>
                                        <td>{{ $paciente ->tipo_sangre}}</td>
                                        <td>{{ $paciente ->alergias}}</td>
                                        <td>{{ $paciente ->observaciones}}</td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/pacientes/'.$paciente->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/pacientes/'.$paciente->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/pacientes/'.$paciente->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de TOTAL Pacientes",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                                    "infoFiltered": "(Filtrado de _MAX_ total Pacientes)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Pacientes",
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
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Mostrar columnas',
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
    
@endsection

