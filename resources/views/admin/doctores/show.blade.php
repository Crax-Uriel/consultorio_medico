@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Doctor: {{$doctor->nombre_doctor}} {{$doctor->apellido_paterno_doctor}} {{$doctor->apellido_materno_doctor}}</b></h1>
    <br>
    <div class="row">
        <div class="col-md-9" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
               
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre(s): </label> 
                                    <p>{{$doctor->nombre_doctor}}</p>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Paterno: </label> 
                                    <p>{{$doctor->apellido_paterno_doctor}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Materno: </label> 
                                    <p>{{$doctor->apellido_materno_doctor}}</p>
                                    
                                </div>
                            </div>

                            
                            
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono: </label>
                                    <p>{{$doctor->celular}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">CURP: </label> 
                                    <p>{{$doctor->curp}}</p>
                                </div>
                            </div>

                            
                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Cedula Profesional: </label> 
                                    <p>{{$doctor->licencia_medica}}</p>
                                   
                                </div>
                            </div>
                
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Especialidad: </label> <b>*</b>
                                    <p>{{$doctor->especialidad}}</p>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo electronico </label> <b>*</b>
                                    <p>{{$doctor->user->email}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                    
                        <br>
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/doctores'}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

