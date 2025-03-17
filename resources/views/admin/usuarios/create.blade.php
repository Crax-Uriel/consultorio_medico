@extends('layouts.admin')
@section('title')
    Usuarios
@endsection
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Registro de Usuarios</b></h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                    {!! BootForm::open([
                        'model' => $usuario,
                        'store' => 'admin.usuarios.store',
                        'update' => 'admin.usuarios.update',
                        'enctype' => 'multipart/form-data',
                        'id' => 'form',
                    ]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::text('Nombre de Usuario: *', 'name')!!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'email')->maxlength(150) !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::password('Contraseña *', 'password') !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::password('Confirma la Contraseña *', 'password_confirmation') !!}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::submit('Guardar')->class('btn btn-primary') !!}
                                    <a href="{{'/admin/usuarios'}}" class="btn btn-danger">Cancelar</a>
                                    
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