@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Usuario: {{$secretaria->nombres}}</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre(s): </label>
                                    <p>{{$secretaria->nombres}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos: </label> 
                                    <p>{{$secretaria->apellido_paterno}} {{$secretaria->apellido_materno}}</p>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular: </label> 
                                    <p>{{$secretaria->celular}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">CURP: </label> 
                                    <p>{{$secretaria->curp}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de nacimiento: </label> 
                                    <p>{{$secretaria->fecha_nacimiento}}</p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Direccion: </label>
                                    <p>{{$secretaria->direccion}}</p>
                                </div>
                            </div>
                
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Correo electronico:</label> 
                                    <p>{{$secretaria->user->email}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Estatus:</label> 
                                    <p>{{$secretaria->status}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Sexo:</label> 
                                    <p>{{$secretaria->sexo}}</p>
                                </div>
                            </div>
                            
                    
                        </div>
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/secretarias'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection