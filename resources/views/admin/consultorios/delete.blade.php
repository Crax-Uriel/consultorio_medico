@extends('layouts.admin')
@section('title')
Consultorios
@endsection
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Eliminar consultorio de: {{$consultorio->nombre_consultorio}}</b></h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este registro?</h3>
                </div>
                {!!BootForm::open()->action(route('admin.consultorios.destroy',$consultorio->id))->delete() !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    {!! BootForm::text('Nombre Consultorio: *', 'nombre_consultorio')->value(old('nombre_consultorio', $consultorio->nombre_consultorio))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form group">
                                    {!! BootForm::text('Descripcion del consultorio:', 'descripcion')->value(old('descripcion', $consultorio->descripcion))->disabled()!!}
                                </div>
                            </div>
                            
                            

                            
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Especialidad: *', 'especialidad')->value(old('especialidad', $consultorio->especialidad))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::text('Ubicacion: *', 'ubicacion')->value(old('ubicacion', $consultorio->ubicacion))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    {!! BootForm::number('Capacidad: *', 'capacidad')->value(old('capacidad', $consultorio->capacidad))->disabled()!!}
                                </div>
                            </div>

                            

                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    {!! BootForm::text('Telefono del consultorio: ', 'telefono')->value(old('telefono', $consultorio->telefono))->disabled()!!}
                                </div>
                            </div>

                            

                            <div class="col-md-5">
                                <div class="form group">
                                    {!! BootForm::select('Estado: *', 'estado')
                                        ->options([
                                            '' => 'Seleccione un estado..', 
                                            'Activo' => 'Activo',
                                            'Inactivo' => 'Inactivo',
                                            
                                        ])->class('form-control')->select($consultorio->estado)->disabled()
                                        
                                    !!}
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::submit('Eliminar')->class('btn btn-danger') !!}
                                    <a href="{{'/admin/consultorios'}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! BootForm::close() !!}
                    
            </div>
        </div>
    </div>
@endsection