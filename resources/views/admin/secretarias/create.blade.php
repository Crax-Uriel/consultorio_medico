@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Registro de Secretari@s</b></h1>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/secretarias/store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre(s): </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombres" value="{{old('nombres')}}" required>
                                    @error('nombres')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellido Paterno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_paterno" value="{{old('apellido_paterno')}}" required>
                                    @error('apellido_paterno')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellido Materno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_materno" value="{{old('apellido_materno')}}" required>
                                    @error('apellido_materno')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular: </label> <b>*</b>
                                    <input type="text" class="form-control" name="celular" value="{{old('celular')}}" required>
                                    @error('celular')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">CURP: </label> <b>*</b>
                                    <input type="text" class="form-control" name="curp" value="{{old('curp')}}" required>
                                    @error('curp')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Direccion: </label> <b>*</b>
                                    <input type="address" class="form-control" name="direccion" value="{{old('direccion')}}" required>
                                    @error('direccion')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Sexo: </label> <b>*</b>
                                    <select class="form-control" id="sexo" name="sexo" required >
                                        <option value="" disabled {{ old('sexo') == '' ? 'selected' : '' }}>Seleccione una opción..</option>
                                        <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                        <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                                    
                                    </select>

                                    @error('sexo')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Status: </label> <b>*</b>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>Seleccione una opción..</option>
                                        <option value="Activo" {{ old('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                                        <option value="Inactivo" {{ old('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    </select>

                                    @error('sexo')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento: </label> <b>*</b>
                                    <input type="date" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
                                    @error('fecha_nacimiento')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div> 

                        </div>
                        <br>
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Correo electronico </label> <b>*</b>
                                    <input type="email" value="{{old('email')}}" class="form-control" name="email" required>
                                    @error('email')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Contraseña </label> <b>*</b>
                                    <input type="password" value="{{old('password')}}" class="form-control" name="password" required>
                                    @error('password')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Confirmar Contraseña </label> <b>*</b>
                                    <input type="password" class="form-control" name="password_confirmation" required>
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
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{'/admin/secretarias'}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

