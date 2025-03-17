@extends('layouts.admin')
@section('content')
    <h1 class="m-0" style="font-size: 30px;"><b>Secretari@s</b></h1>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Secretari@s Registradas</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/secretarias/create')}}" class="btn btn-secondary" style="background-color: #8fc9ff">
                            <i class="bi bi-plus-square-fill"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body" >
                    
                    <table id="example1" class="table table-primary table-striped table-borderless table-hover" style="text-align: center">
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro.</b></td>
                                <td><b>Nombre(s) y Apellidos</b></td>
                                <td><b>CURP</b></td>
                                <td><b>Celular</b></td>
                                <td><b>Fecha de nacimiento</b></td>
                                <td><b>Direccion</b></td>
                                <td><b>Correo Electronico</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody>
                                <?php $contador=1; ?>
                                @foreach ($secretarias as $secretaria)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $secretaria ->nombres}} {{ $secretaria ->apellido_materno}} {{ $secretaria ->apellido_paterno}}</td>
                                        <td>{{ $secretaria ->curp}}</td>
                                        <td>{{ $secretaria ->celular}}</td>
                                        <td>{{ $secretaria ->fecha_nacimiento}}</td>
                                        <td>{{ $secretaria ->direccion}}</td>
                                        <td>{{ $secretaria ->user->email}}</td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/secretarias/'.$secretaria->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/secretarias/'.$secretaria->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/secretarias/'.$secretaria->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de TOTAL Secretarias",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",
                                    "infoFiltered": "(Filtrado de _MAX_ total Secretarias)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Secretarias",
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

