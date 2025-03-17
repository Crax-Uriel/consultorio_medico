@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Configuracion de : {{$configuracion->nombre}}</h1>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                <form action="{{url('/admin/configuraciones/create')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Nombre del consultorio medico:</label>
                                            <p>{{$configuracion->nombre}}</p>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Direccion del consultorio medico:</label>
                                            <p>{{$configuracion->direccion}}</p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Telefono del consultorio medico:</label>
                                            <p>{{$configuracion->telefono}}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Correo electronico del consultorio medico:</label>
                                            <p>{{$configuracion->correo}}</p>
                                        </div>
                                    </div>

                                </div>


                            
                            </div>

                            <div class="col-md-4">
                                <div class="col-md-12" style="text-align: center">
                                    <div class="form group">
                                        <label for="" >Logotipo</label>
                                        <br><br>
                                        <center>
                                            <img src="{{url('storage/'.$configuracion ->logo)}}" alt="Logo" width="100px">
                                        </center>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                            
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/configuraciones'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection