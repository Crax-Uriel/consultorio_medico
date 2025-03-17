@extends('layouts.admin')
@section('title')
    Pacientes
@endsection
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Registro de Pacientes</b></h1>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre(s): </label>
                                    <p>{{$paciente->nombre_paciente}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Paterno: </label>
                                    <p>{{$paciente->apellido_paterno_paciente}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Materno: </label>
                                    <p>{{$paciente->apellido_materno_paciente}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form group">
                                    <label for="">NSS: </label>
                                    <p>{{$paciente->nss}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">CURP: </label>
                                    <p>{{$paciente->curp_paciente}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento:  </label>
                                    <p>{{$paciente->fecha_nacimiento_paciente}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico: </label>
                                    <p>{{$paciente->correo_paciente}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form group">
                                    
                                    <label for="">Sexo: </label>
                                    <p>{{$paciente->sexo_paciente}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    

                                    <label for="">Tipo de sangre: </label>
                                    <p>{{$paciente->tipo_sangre}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Contacto de emergencia: </label>
                                    <p>{{$paciente->contacto_emergencia}}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Alergias: </label>
                                    <p>{{$paciente->alergias}}</p>
                                </div>
                            </div>


                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Direccion: </label>
                                    <p>{{$paciente->direccion_paciente}}</p>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    <label for="">Celular: </label>
                                    <p>{{$paciente->celular_paciente}}</p>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    <label for="">Peso: </label>
                                    <p>{{ number_format($paciente->peso, 2, '.', ',') }}</p>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    <label for="">Altura: </label>
                                    <p>{{$paciente->altura}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Observaciones: </label>
                                    <p>{{$paciente->observaciones}}</p>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/pacientes'}}" class="btn btn-danger">Cancelar</a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection