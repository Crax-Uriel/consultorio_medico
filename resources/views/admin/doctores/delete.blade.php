@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Registro de Doctores</b></h1>
    <br>
    <div class="row">
        <div class="col-md-9" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/doctores',$doctor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre(s): </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombre_doctor" value="{{$doctor->nombre_doctor}}" required>
                                    @error('nombre_doctor')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Paterno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_paterno_doctor" value="{{$doctor->apellido_paterno_doctor}}" required>
                                    @error('apellido_paterno_doctor')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Materno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_materno_doctor" value="{{$doctor->apellido_materno_doctor}}" required >
                                    @error('apellido_materno_doctor')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono: </label> <b>*</b>
                                    <input type="text" class="form-control" name="celular" value="{{$doctor->celular}}" >
                                    @error('celular')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">CURP: </label> <b>*</b>
                                    <input type="text" class="form-control" name="curp" value="{{$doctor->curp}}" required>
                                    @error('curp')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Cedula Profesional: </label> <b>*</b>
                                    <input type="text" class="form-control" name="licencia_medica" value="{{$doctor->licencia_medica}}" required>
                                    @error('licencia_medica')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Especialidad: </label> <b>*</b>
                                    <input type="text" class="form-control" name="especialidad" value="{{$doctor->especialidad}}" required>
                                    @error('especialidad')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                    
                        <br>
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo electronico </label> <b>*</b>
                                    <input type="email" value="{{$doctor->user->email}}" class="form-control" name="email" required>
                                    @error('email')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña </label> <b>*</b>
                                    <input type="password" value="{{old('password')}}" class="form-control" name="password" >
                                    @error('password')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Confirmar Contraseña </label> <b>*</b>
                                    <input type="password" class="form-control" name="password_confirmation" >
                                    @error('password_confirmation')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <button type="submit" class="btn btn-warning">Actualizar</button>
                                    <a href="{{'/admin/doctores'}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

