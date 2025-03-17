@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Historial Clinico de: {{ $historial->paciente->apellido_paterno_paciente}} {{ $historial->paciente->apellido_materno_paciente}} {{ $historial->paciente->nombre_paciente}}</h1>
    <br>
    <div class="row">
        <div class="col-md-8" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">  <!-- formulario -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form group">
                                                    <label for="">Nombre del Paciente:</label>
                                                    <p>{{ $historial->paciente->apellido_paterno_paciente}} {{ $historial->paciente->apellido_materno_paciente}} {{ $historial->paciente->nombre_paciente}}</p>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form group">
                                                    <label for="">Fecha de visita:</label> <b>*</b>
                                                    <p>{{ $historial->fecha_visita}}</p>
                                                   
                                                </div>
                                            </div>

                                        </div>
                                        <br>

                                        
                                    </div>

                
                                    
                                    
                                    
                                        
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Descripcion de la cita: </label> <b>*</b>
                                            <p>{!! $historial->detalle!!}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                
                                

                            
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <a href="{{'/admin/historial'}}" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div> 
                    
                </div> <!-- fin row  -->    
            </div>
        </div>

        

    </div>
@endsection