@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;"><b>Actualizar  Pago</b></h1>
    <br>
    <div class="row">
        <div class="col-md-9" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/pagos',$pago->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Paciente:</label> <b>*</b>
                                    <select name="paciente_id"  class="form-control">
                                        <option value="" disabled selected>Seleccionar paciente..</option>
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{$paciente->id}}" {{ $pago->paciente_id == $paciente->id ? 'selected' : '' }}>{{$paciente->apellido_paterno_paciente." ".$paciente->apellido_materno_paciente." ".$paciente->nombre_paciente}}</option>
                                        @endforeach
                                    </select>
                                        @error('paciente_id')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Doctor: </label> <b>*</b>
                                    <select name="doctor_id" id="" class="form-control">
                                        <option value="" disabled selected>Seleccionar doctor..</option>
                                        @foreach ($doctores as $doctore)
                                            <option value="{{$doctore->id}}" {{ $pago->doctor_id == $doctore->id ? 'selected' : '' }}> {{$doctore->nombre_doctor." ".$doctore->apellido_paterno_doctor}}</option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                    
                            
                        </div>
                        <br>
                        <div class="row">

                
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de pago: </label> <b>*</b>
                                    <input type="date" class="form-control" name="fecha_pago" value="{{$pago->fecha_pago}}" required>
                                    @error('fecha_pago')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Monto: </label> <b>*</b>
                                    <input type="text" class="form-control" name="monto" value="{{$pago->monto}}" required>
                                    @error('monto')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

            
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Descripcion: </label> <b>*</b>
                                    <input type="text" class="form-control" name="descripcion" value="{{$pago->descripcion}}" required>
                                    @error('descripcion')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                
                        </div>
                        <br>
                
                    
        
            
        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <button type="submit" class="btn btn-warning">Actualizar</button>
                                    <a href="{{'/admin/pagos'}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

