@extends('layouts.admin')
@section('content')
    <h1 class="m-0" style="font-size: 30px;">Historiales Clinicos </h1>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historiales Clinicos Registradas</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/historial/create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-square-fill"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <table id="example1" class="table table-primary table-striped table-borderless table-hover" >
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Paciente</b></td>
                                <td><b>Fecha de la cita medica</b></td>
                                <td><b>Detalle de la cita medica</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <?php $contador=1; ?>
                            @foreach ($historiales as $historiale)
                                @if ($historiale->doctor_id == Auth::user()->doctor->id)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $historiale->paciente->apellido_paterno_paciente}} {{ $historiale->paciente->apellido_materno_paciente}} {{ $historiale->paciente->nombre_paciente}}</td>
                                        <td>{{ $historiale ->fecha_visita}}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($historiale->detalle, 50, '...') !!}</td>

                                    
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/historial/'.$historiale->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/historial/'.$historiale->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/historial/'.$historiale->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        
                    </table>
                    <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de TOTAL Historiales",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Historiales",
                                    "infoFiltered": "(Filtrado de _MAX_ total Historiales)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Historiales",
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
    
@endsection

