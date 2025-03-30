@extends('layouts.admin')
@section('title')
    Pacientes
@endsection
@section('content')
    <h1 class="m-0" style="font-size: 30px;"> <b>Pagos</b></h1>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pagos Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/pagos/create')}}" class="btn btn-secondary" style="background-color: #8fc9ff">
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
                                <td><b>Doctor</b></td>
                                <td><b>Fecha de pago</b></td>
                                <td><b>Monto</b></td>            
                                <td><b>Descripcion</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody style="text-align: center">
                                <?php $contador=1; ?>
                                @foreach ($pagos as $pago)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $pago->paciente ->nombre_paciente}} {{ $pago->paciente ->apellido_paterno_paciente}} {{ $pago->paciente ->apellido_materno_paciente}}</td>
                                        <td>{{ $pago->doctor ->nombre_doctor}} {{ $pago->doctor ->apellido_paterno_doctor}} {{ $pago->doctor ->apellido_materno_doctor}}</td>
                                        <td>{{ $pago ->fecha_pago}}</td>
                                        <td>{{ $pago ->monto}}</td>
                                        <td>{{ $pago ->descripcion}}</td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/pagos/pdf/'.$pago->id)}}" type="button" class="btn btn-secondary btn-sms" target="_blank"><i class="bi bi-printer-fill"></i></a>

                                                <a href="{{url('/admin/pagos/'.$pago->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/pagos/'.$pago->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/pagos/'.$pago->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <hr>
                    <h4>Resumen Total de pagos: {{$total_monto}} </h4>
                    <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de TOTAL Pagos",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                                    "infoFiltered": "(Filtrado de _MAX_ total Pagos)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Pagos",
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

