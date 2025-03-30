@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Buscar paciente</h1>
    <br>
    <div class="row">
        <div class="col-md-9" style="font-size: 15px;">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar al paciente</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">  <!-- formulario -->
                            <div class="card-body">
                                <form action="{{route('admin.historial.buscar_paciente')}}" method="GET">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form group">
                                                <label for="" >CURP del paciente: </label>
                                                <input name="curp_paciente" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div style="height: 30px"></div>
                                            <div class="form-group">
                                                
                                                <button class="btn btn-primary">
                                                    <i class="bi bi-search"> Buscar paciente</i>
                                                    
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                        
                                

                            
                                <br>
                                <hr>
                                @if ($paciente )
                                <div class="row" style="font-size: 15px;">
                                        <h3>Informacion del paciente</h3>
                                        <br>
                                        <table >
                                            <tr >
                                                <td >Paciente: </td>
                                                <td> {{$paciente->apellido_paterno_paciente." ".$paciente->apellido_materno_paciente." ".$paciente->nombre_paciente}} </td>
                                            </tr>
                                            <tr class="row-hover">
                                                <td><b>CURP: </b></td>
                                                <td>{{$paciente->curp_paciente}}</td>
                                            </tr>
                                            <tr >
                                                <td><b>Numero de seguro social: </b></td>
                                                <td>{{$paciente->nss}}</td>
                                            </tr>
                                            <tr >
                                                <td><b>Fecha de nacimiento: </b></td>
                                                <td>{{$paciente->fecha_nacimiento_paciente}}</td>
                                            </tr>
                                    
                                            <tr>
                                                <td><b></b></td>
                                            </tr>
                                        </table>
                                        <br>
                                        <a href="{{url('/admin/historial/paciente',$paciente->id)}} " class="btn btn-success">Imprimir historial del paciente</a>


                                @else 
                                    <p>paciente no regsitrado </p>
                                @endif
                                
                                    
                                    
                                </div>
                                


                                
                            </div>
                    </div> 
                </div> <!-- fin row  -->    
            </div>
        </div>

        

    </div>
@endsection