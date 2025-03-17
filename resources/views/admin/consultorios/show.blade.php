@extends('layouts.admin')
@section('title')
Consultorios
@endsection
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Consultorio: {{$consultorio->nombre_consultorio}}</b></h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">

                                    <label for="">Nombre Consultorio: </label>
                                    <p>{{$consultorio->nombre_consultorio}}</p>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form group">
                                    <label for="">Descripcion del consultorio: </label>
                                    <p>{{$consultorio->descripcion}}</p>
                                </div>
                            </div>
                            
                            

                            
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Especialidad: </label>
                                    <p>{{$consultorio->especialidad}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Ubicacion: </label>
                                    <p>{{$consultorio->ubicacion}}</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Capacidad: </label>
                                    <p>{{$consultorio->capacidad}}</p>
                                </div>
                            </div>

                            

                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Telefono del consultorio: </label>
                                    <p>{{$consultorio->telefono}}</p>
                                </div>
                            </div>

                            

                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Estado: </label>
                                    <p>{{$consultorio->estado}}</p>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/consultorios'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection