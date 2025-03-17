@extends('layouts.admin')
@section('title')
    Pacientes
@endsection
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Eliminar: {{$paciente->nombre_paciente}}</b></h1>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este registro?</h3>
                </div>
                    {{-- {!!BootForm::open()->action(url('admin/pacientes',$paciente->id))->put() !!} --}}
                    {!!BootForm::open()->action(route('admin.pacientes.destroy',$paciente->id))->delete() !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Nombre(s): *', 'nombre_paciente')->value(old('nombre_paciente', $paciente->nombre_paciente))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Apellido Paterno: *', 'apellido_paterno_paciente')->value(old('apellido_paterno_paciente', $paciente->apellido_paterno_paciente))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Apellido Materno: *', 'apellido_materno_paciente')->value(old('apellido_materno_paciente', $paciente->apellido_materno_paciente))->disabled()!!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::text('NSS: *', 'nss')->value(old('nss', $paciente->nss))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::text('CURP: *', 'curp_paciente')->value(old('curp_paciente', $paciente->curp_paciente))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::date('Fecha de nacimiento: *', 'fecha_nacimiento_paciente')->value(old('fecha_nacimiento_paciente', $paciente->fecha_nacimiento_paciente))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'correo_paciente')->maxlength(150)->value(old('correo_paciente', $paciente->correo_paciente))->disabled() !!}
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
                                            
                                        ])->class('form-control')->select($paciente->sexo_paciente)->disabled()
                                        
                                    !!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::select('Tipo de sangre: *', 'tipo_sangre')
                                        ->options([
                                            '' => 'Seleccione tipo de sangre...', 
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-',
                                            'O+' => 'O+',
                                            'O-' => 'O-'
                                            
                                        ])->class('form-control')->select($paciente->tipo_sangre)->disabled()
                                        
                                    !!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::text('Contacto de emergencia: *', 'contacto_emergencia')->value(old('contacto_emergencia', $paciente->contacto_emergencia))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    {!! BootForm::text('Alergias: *', 'alergias')->value(old('alergias', $paciente->alergias))->disabled()!!}
                                </div>
                            </div>


                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Direccion: *', 'direccion_paciente')->value(old('direccion_paciente', $paciente->direccion_paciente))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::text('Celular: *', 'celular_paciente')->value(old('celular_paciente', $paciente->celular_paciente))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::number('Peso: ', 'peso')->attribute('step', 'any')->value(number_format(old('peso', $paciente->peso), 2))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form group">
                                    {!! BootForm::number('Altura: ', 'altura')->attribute('step', 'any')->value(old('altura', $paciente->altura))->disabled()!!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::textarea('Observaciones: ', 'observaciones')->maxlength(250)->rows(3)->value(old('observaciones', $paciente->observaciones))->disabled()!!}
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::submit('Eliminar')->class('btn btn-danger') !!}
                                    <a href="{{'/admin/pacientes'}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection