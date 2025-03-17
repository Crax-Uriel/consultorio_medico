@extends('layouts.admin')
@section('content')
    <h1 class="m-0" style="font-size: 30px;">Configuraciones</h1>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Configuraciones Registradas</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/configuraciones/create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-square-fill"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <table id="example1" class="table table-primary table-striped table-borderless table-hover" >
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Consultorio Medico</b></td>
                                <td><b>Direccion</b></td>
                                <td><b>Telefono</b></td>
                                <td><b>Correo</b></td>
                                <td><b>Logo</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody>
                                <?php $contador=1; ?>
                                @foreach ($configuraciones as $configuracione)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $configuracione ->nombre}}</td>
                                        <td>{{ $configuracione ->direccion}}</td>
                                        <td>{{ $configuracione ->telefono}}</td>
                                        <td>{{ $configuracione ->correo}}</td>
                                        <td>
                                            <img src="{{url('storage/'.$configuracione ->logo)}}" alt="Logo" width="100px">
                                            
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/configuraciones/'.$configuracione->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/configuraciones/'.$configuracione->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/configuraciones/'.$configuracione->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de TOTAL Configuraciones",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Configuraciones",
                                    "infoFiltered": "(Filtrado de _MAX_ total Configuraciones)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Configuraciones",
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

