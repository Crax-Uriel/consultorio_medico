@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Pago</b></h1>
    <br>
    <div class="row">
        <div class="col-md-9" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Paciente:</label> <b>*</b>
                                    <p>{{$pago->paciente->apellido_paterno_paciente." ".$pago->paciente->apellido_materno_paciente." ".$pago->paciente->nombre_paciente}}</p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Doctor: </label> <b>*</b>
                                    <p>{{$pago->doctor->nombre_doctor." ".$pago->doctor->apellido_paterno_doctor." ".$pago->doctor->apellido_materno_doctor}}</p>
                                    
                                </div>
                            </div>

                    
                            
                        </div>
                        <br>
                        <div class="row">

                
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de pago: </label> <b>*</b>
                                    <p>{{$pago->fecha_pago}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Monto: </label> <b>*</b>
                                    <p>{{$pago->monto}}</p>
                                   
                                </div>
                            </div>

            
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Descripcion: </label> <b>*</b>
                                    <p>{{$pago->descripcion}}</p>
                                </div>
                            </div>
                
                        </div>
                        <br>
                
                    
        
            
        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/pagos'}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

