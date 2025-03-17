@extends('layouts.admin')
@section('content')
    <h1 class="m-0" style="font-size: 30px;">Reservas</h1>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Reservas Registrados</h3>
                    
                </div>
                <div class="card-body" >
                    
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Doctor</b></td>
                                <td><b>Fecha de reserva</b></td>
                                <td><b>Hora de reserva</b></td>
                                <td><b>Fecha y hora de registro</b></td>
                                
                            </tr>
                        </thead>
                            <tbody>
                                <?php $contador=1; ?>
                                @foreach ($eventos as $evento)
                                    <tr style="text-align: center">    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $evento ->doctor->nombre_doctor." ".$evento ->doctor->apellido_paterno_doctor." ".$evento ->doctor->apellido_materno_doctor}}</td> 

                                        <td>{{ \Carbon\Carbon::parse($evento ->start)->format('Y-m-d')}}</td>
                                        <td>{{ \Carbon\Carbon::parse($evento ->start)->format('H:i')}}</td>
                                        <td>{{$evento ->created_at}}</td>
                                    
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <form action="{{ url('admin/eventos/destroy', $evento->id) }}" method="post" id="formulario{{$evento->id}}" onclick="preguntar{{$evento->id}}(event)">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger btn-sm" type="submit">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{$evento->id}}(event){
                                                        event.preventDefault();
                                                        Swal.fire({
                                                        title: "¿Desea eliminar este registro de reserva?",
                                                        text:"Si usted elimina este registro otro usuario podria reservar este horario ",
                                                        showDenyButton: true,
                                                        showCancelButton: false,
                                                        confirmButtonText: "Eliminar",
                                                        denyButtonText: `Cancelar`
                                                        }).then((result) => {
                                                        /* Read more about isConfirmed, isDenied below */
                                                        if (result.isConfirmed) {
                                                            var form = $('#formulario{{$evento->id}}');
                                                            form.submit();
                                                        } else if (result.isDenied) {
                                                            
                                                        }
                                                        });
                                
                                                    }
                                                </script>
                                                
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
                                    "info": "Mostrando _START_ a _END_ de TOTAL Reservas",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
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
                    
            </div>
            </div>
        </div>
    </div>
@endsection

