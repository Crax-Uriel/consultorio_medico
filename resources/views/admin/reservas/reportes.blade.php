@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Reportes de Reservas de citas</h1>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Generar Reporte</h3>
                </div>
                    <div class="card-body">
                        <a href="{{url('/admin/reservas/pdf')}}" target="_blank" class="btn btn-success"><i class="bi bi-printer"></i> Listado de todas las reservas</a>
                    </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Generar Reporte por fechas</h3>
                </div>
                
                    <div class="card-body">
                        <form action=" {{route('admin.reservas.pdf_fechas')}} " method="GET" target="_blank">
                            <div class="row">
                                <div class="com-md-4">
                                    <label for="">Fecha inicio: </label>
                                    <input type="date" name="fecha_inicio" id="" class="form-control">
                                </div>

                                <div class="com-md-4">
                                    <label for="">Fecha fin: </label>
                                    <input type="date" name="fecha_fin" id="" class="form-control">
                                    <br>
                                </div>
                            
                                <div class="com-md-4">
                                    <hr>
                                    <button class="btn btn-success" >
                                        <i class="bi bi-printer"></i>
                                            Generar reporte
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        
                    </div>
                
            </div>
        </div>
    </div>
@endsection