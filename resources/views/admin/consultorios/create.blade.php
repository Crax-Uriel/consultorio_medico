@extends('layouts.admin')
@section('title')
Consultorios
@endsection
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Registro de Consultorios</b></h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                    {!! BootForm::open([
                        'model' => $consultorio,
                        'store' => 'admin.consultorios.store',
                        'update' => 'admin.consultorios.update',
                        'enctype' => 'multipart/form-data',
                        'id' => 'form',
                    ]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    {!! BootForm::text('Nombre Consultorio: *', 'nombre_consultorio')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form group">
                                    {!! BootForm::text('Descripcion del consultorio:', 'descripcion')->required()!!}
                                </div>
                            </div>
                            
                            

                            
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Especialidad: *', 'especialidad')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::text('Ubicacion: *', 'ubicacion')->required()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::number('Capacidad: *', 'capacidad')->required()!!}
                                </div>
                            </div>

                            

                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    {!! BootForm::text('Telefono del consultorio: ', 'telefono')->required()!!}
                                </div>
                            </div>

                            

                            <div class="col-md-5">
                                <div class="form group">
                                    {!! BootForm::select('Estado: *', 'estado')
                                        ->options([
                                            '' => 'Seleccione un estado..', 
                                            'Activo' => 'Activo',
                                            'Inactivo' => 'Inactivo',
                                            
                                        ])->class('form-control')
                                        
                                    !!}
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::submit('Guardar')->class('btn btn-primary') !!}
                                    <a href="{{'/admin/consultorios'}}" class="btn btn-danger">Cancelar</a>
                                    
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