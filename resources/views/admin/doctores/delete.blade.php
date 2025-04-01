@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Eliminar doctor</b></h1>
    <br>
    <div class="row">
        <div class="col-md-9" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminae este doctor?</h3>
                </div>
                <form action="{{url('admin/doctores',$doctor->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre(s): </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombre_doctor" value="{{$doctor->nombre_doctor}}" disabled>
                                    @error('nombre_doctor')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Paterno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_paterno_doctor" value="{{$doctor->apellido_paterno_doctor}}" disabled>
                                    @error('apellido_paterno_doctor')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellido Materno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_materno_doctor" value="{{$doctor->apellido_materno_doctor}}" disabled >
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
                                    <input type="text" class="form-control" name="celular" value="{{$doctor->celular}}" disabled>
                                    @error('celular')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">CURP: </label> <b>*</b>
                                    <input type="text" class="form-control" name="curp" value="{{$doctor->curp}}" disabled>
                                    @error('curp')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Cedula Profesional: </label> <b>*</b>
                                    <input type="text" class="form-control" name="licencia_medica" value="{{$doctor->licencia_medica}}" disabled>
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
                                    <input type="text" class="form-control" name="especialidad" value="{{$doctor->especialidad}}" disabled>
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
                                    <input type="email" value="{{$doctor->user->email}}" class="form-control" name="email" disabled>
                                    @error('email')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                    
                        
                        </div>
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a href="{{'/admin/doctores'}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

