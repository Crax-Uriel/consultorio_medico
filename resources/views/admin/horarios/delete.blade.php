@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Eliminar Horario: {{ $horario->dia }}-{{ $horario->hora_inicio }}-{{ $horario->hora_fin }}</h1>
    <br>
    <div class="row">
        <div class="col-md-6 ">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este horario?</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.horarios.destroy', $horario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Barbería y asiento:</label> <b>*</b>
                                        <select name="barberia_id" id="consultorio_select" class="form-control" disabled>
                                            <option value="" disabled>Seleccionar Asiento</option>
                                            @foreach ($espacios as $espacio)
                                                <option value="{{ $espacio->id }}" {{ $horario->espacio_id == $espacio->id ? 'selected' : '' }}>
                                                    {{ $espacio->nombre . " - " . $espacio->ubicacion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Barbero:</label> <b>*</b>
                                        <select name="barbero_id" class="form-control" disabled>
                                            @foreach ($licenciados as $licenciado)
                                                <option value="{{ $licenciado->id }}" {{ $horario->licenciado_id == $licenciado->id ? 'selected' : '' }}>
                                                    {{ $licenciado->nombres . " " . $licenciado->apellidos }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Día:</label> <b>*</b>
                                        <input type="text" class="form-control" name="dia" value="{{ $horario->dia }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Hora inicio:</label> <b>*</b>
                                        <input type="time" class="form-control" name="hora_inicio" value="{{ $horario->hora_inicio }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Hora final:</label> <b>*</b>
                                        <input type="time" class="form-control" name="hora_fin" value="{{ $horario->hora_fin }}" disabled>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div id="consultorio_info">
                            <!-- Puedes añadir información adicional aquí si es necesario -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
