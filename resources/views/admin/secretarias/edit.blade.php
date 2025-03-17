@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Actulizar: {{$secretaria->nombres}}</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/secretarias',$secretaria->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre(s):  </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombres" value="{{$secretaria->nombres}}" required>
                                    @error('nombres')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellido Paterno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_paterno" value="{{$secretaria->apellido_paterno}}" required>
                                    @error('apellido_paterno')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellido Materno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_materno" value="{{$secretaria->apellido_materno}}" required>
                                    @error('apellido_materno')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular: </label> <b>*</b>
                                    <input type="text" class="form-control" name="celular" value="{{$secretaria->celular}}" required>
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
                                    <input type="text" class="form-control" name="curp" value="{{$secretaria->curp}}" required>
                                    @error('curp')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Direccion: </label> <b>*</b>
                                    <input type="address" class="form-control" name="direccion" value="{{$secretaria->direccion}}" required>
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
                                    <label for="">Fecha de nacimiento: </label> <b>*</b>
                                    <input type="date" class="form-control" name="fecha_nacimiento" value="{{$secretaria->fecha_nacimiento}}" required>
                                    @error('fecha_nacimiento')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Sexo: </label> <b>*</b>
                                    <select class="form-control" id="sexo" name="sexo" required >
                                        <option value="" disabled {{ old('sexo', $secretaria->sexo ?? '') == '' ? 'selected' : '' }}>Seleccione una opción..</option>
                                        <option value="M" {{ old('sexo', $secretaria->sexo ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
                                        <option value="F" {{ old('sexo', $secretaria->sexo ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
                                    
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
                                        <option value="" disabled {{ old('status', $secretaria->status ?? '') == '' ? 'selected' : '' }}>Seleccione una opción..</option>
                                        <option value="Activo" {{ old('status', $secretaria->status ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
                                        <option value="Inactivo" {{ old('status', $secretaria->status ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    </select>

                                    @error('sexo')
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
                                    <input type="email"  class="form-control" name="email" value="{{$secretaria->user->email}}" required>
                                    @error('email')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Contraseña </label>
                                    <input type="password" value="{{old('password')}}" class="form-control" name="password">
                                    @error('password')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Confirma la Contraseña </label>
                                    <input type="password" class="form-control" name="password_confirmation">
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
                                    <a href="{{'/admin/secretarias'}}" class="btn btn-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-warning">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection