@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Eliminar: {{$secretaria->nombres}}</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este usuario?</h3>
                </div>
                <form action="{{url('/admin/secretarias',$secretaria->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre(s):  </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombres" value="{{$secretaria->nombres}}" disabled>
                                    @error('nombres')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellido Paterno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_paterno" value="{{$secretaria->apellido_paterno}}" disabled>
                                    @error('apellido_paterno')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellido Materno: </label> <b>*</b>
                                    <input type="text" class="form-control" name="apellido_materno" value="{{$secretaria->apellido_materno}}" disabled>
                                    @error('apellido_materno')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular: </label> <b>*</b>
                                    <input type="text" class="form-control" name="celular" value="{{$secretaria->celular}}" disabled>
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
                                    <input type="text" class="form-control" name="curp" value="{{$secretaria->curp}}" disabled>
                                    @error('curp')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Direccion: </label> <b>*</b>
                                    <input type="address" class="form-control" name="direccion" value="{{$secretaria->direccion}}" disabled>
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
                                    <input type="date" class="form-control" name="fecha_nacimiento" value="{{$secretaria->fecha_nacimiento}}" disabled>
                                    @error('fecha_nacimiento')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Sexo: </label> <b>*</b>
                                    <select class="form-control" id="sexo" name="sexo" disabled >
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
                                    <select class="form-control" id="status" name="status" disabled>
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
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo electronico </label> <b>*</b>
                                    <input type="email"  class="form-control" name="email" value="{{$secretaria->user->email}}" disabled>
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
                                    <a href="{{'/admin/secretarias'}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection