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
                    {!! BootForm::open([
                        'model' => $paciente,
                        'store' => 'admin.pacientes.store',
                        'update' => 'admin.pacientes.update',
                        'enctype' => 'multipart/form-data',
                        'id' => 'form',
                    ]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Nombre(s): *', 'nombre_paciente')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Apellido Paterno: *', 'apellido_paterno_paciente')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Apellido Materno: *', 'apellido_materno_paciente')->required()!!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::text('NSS: *', 'nss')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::text('CURP: *', 'curp_paciente')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::date('Fecha de nacimiento: *', 'fecha_nacimiento_paciente')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'correo_paciente')->maxlength(150) !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::select('Sexo: *', 'sexo_paciente')
                                        ->options([
                                            '' => 'Seleccione sexo..', 
                                            'M' => 'Masculino',
                                            'F' => 'Femenino',
                                            
                                        ])->class('form-control')
                                        
                                    !!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::select('Tipo de sangre: *', 'tipo_sangre')
                                        ->options([
                                            '' => 'Seleccione tipo de sangre.', 
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-',
                                            'O+' => 'O+',
                                            'O-' => 'O-'
                                            
                                        ])->class('form-control')
                                        
                                    !!}
                                </div>
                            </div>


                            


                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::text('Contacto de emergencia: *', 'contacto_emergencia')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Alergias: *', 'alergias')->required()!!}
                                </div>
                            </div>


                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Direccion: *', 'direccion_paciente')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::text('Celular: *', 'celular_paciente')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::number('Peso: ', 'peso')->attribute('step', 'any')!!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::number('Altura: ', 'altura')->attribute('step', 'any')!!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::textarea('Observaciones: ', 'observaciones')->maxlength(250)->rows(3)!!}
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::submit('Guardar')->class('btn btn-primary') !!}
                                    <a href="{{'/admin/pacientes'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! BootForm::close() !!}
                    {!! $validator !!}
            </div>
        </div>
    </div>
@endsection