@extends('layouts.admin')
@section('title')
    Usuarios
@endsection
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Eliminar  Usuario: {{$usuario->name}}</b></h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este usuario?</h3>
                </div>
                    {!!BootForm::open()->action(route('admin.usuarios.destroy',$usuario->id))->delete() !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::text('Nombre de Usuario: *', 'name')->value(old('name', $usuario->name))->disabled()!!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'email')->maxlength(150)->value(old('email', $usuario->email))->disabled() !!}
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::submit('Eliminar')->class('btn btn-danger') !!}
                                    <a href="{{'/admin/usuarios'}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection