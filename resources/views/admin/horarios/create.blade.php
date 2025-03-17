@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Registro de Horarios</h1>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                
                    <div class="card-body row">
                        <div class="col-md-3">
                            <form action="{{url('/admin/horarios/create')}}" method="POST">
                                @csrf
                                <div class="row"> 

                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Consultorio y ubicacion: </label> <b>*</b>
                                            <select name="consultorio_id" id="consultorio_select" class="form-control">
                                                <option value="" disabled selected>Seleccionar Consultorio</option>
                                                @foreach ($consultorios as $consultorio)
                                                <option value="{{$consultorio->id}}">{{$consultorio->nombre_consultorio."  ".$consultorio->ubicacion}}</option>
                                                @endforeach
                                            </select>
                                            @error('consultorio_id')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <br>
                                    </div>

                                    <script>
                                        $('#consultorio_select').on('change',function(){
                                            var barberia_id = $('#consultorio_select').val();
                                            //alert(consultorio_id);
                                            if (barberia_id) {
                                                $.ajax({
                                                    url:'/admin/horarios/consultorios/'+barberia_id,
                                                    type:'GET',
                                                    success: function(data){
                                                        //console.log(data);  // para verificar qué datos estamos recibiendo
                                                        $('#consultorio_info').html(data);
                                                    },
                                                    error: function(){
                                                        alert('Error al obtener los datos del consultorio')
                                                    }
                                                });
                                            }else{
                                                $('#consultorio_info').html('');
                                            }
                                        });
                                    </script>
                                

                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Doctor: </label> <b>*</b>
                                            <select name="doctor_id" id="" class="form-control">
                                                
                                                @foreach ($doctores as $doctore)
                                                <option value="{{$doctore->id}}">{{$doctore->nombre_doctor." ".$doctore->apellido_paterno_doctor}}</option>
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
                                    <div class="col-md-12 col-sm-4">
                                        <div class="form group">
                                            <label for="">Dia: </label> <b>*</b>
                                            <select name="dia" id="" class="form-control">
                                                <option value="Lunes">LUNES</option>
                                                <option value="Martes">MARTES</option>
                                                <option value="Miercoles">MIERCOLES</option>
                                                <option value="Jueves">JUEVES</option>
                                                <option value="Viernes">VIERNES</option>
                                                <option value="Sabado">SABADO</option>
                                            </select>
                                            @error('dia')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Hora inicio: </label> <b>*</b>
                                            <input type="time" class="form-control" name="hora_inicio" value="{{old('hora_inicio')}}" required>
                                            @error('hora_inicio')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Hora final: </label> <b>*</b>
                                            <input type="time" class="form-control" name="hora_fin" value="{{old('hora_fin')}}" required>
                                            @error('hora_fin')
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
                                            <button type="submit" class="btn btn-success">Enviar</button>

                                            <a href="{{'/admin/horarios'}}" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div id="consultorio_info">

                            </div>
                        </div>
                        
                    </div> <!-- card body-->
                </form>
                
            </div>
        </div>
    </div>
@endsection