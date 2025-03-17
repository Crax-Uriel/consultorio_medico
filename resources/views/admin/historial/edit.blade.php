@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Actulizar Historial Clinico de: {{ $historial->paciente->apellido_paterno_paciente}} {{ $historial->paciente->apellido_materno_paciente}} {{ $historial->paciente->nombre_paciente}}</h1>
    <br>
    <div class="row">
        <div class="col-md-8" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>

                <div class="row">
                    <div class="col-md-12">  <!-- formulario -->
                        <form action="{{url('/admin/historial',$historial->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form group">
                                                    <label for="">Nombre del Paciente:</label> <b>*</b>
                                                    <select name="paciente_id"  class="form-control">
                                                        <option value="" disabled selected>Seleccionar paciente..</option>
                                                        
                                                        @foreach ($pacientes as $paciente)
                                                            <option value="{{$paciente->id}}" {{ $historial->paciente_id == $paciente->id ? 'selected' : '' }}>{{$paciente->apellido_paterno_paciente." ".$paciente->apellido_materno_paciente." ".$paciente->nombre_paciente}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('paciente_id')
                                                        <small style="color: red">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form group">
                                                    <label for="">Fecha de visita:</label> <b>*</b>
                                                    <input type="date" class="form-control" name="fecha_visita" id="fecha_visita" value="<?php echo date('Y-m-d'); ?>" required>

                                                    @error('fecha_visita')
                                                        <small style="color: red">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <br>

                                        
                                    </div>

                
                                    
                                    
                                    
                                        
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Descripcion de la cita: </label> <b>*</b>
                                            <textarea name="detalle" id="editor" cols="100" rows="200"  >{!! $historial->detalle!!}</textarea>
                                            
                                            <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


                                            <script>
                                                ClassicEditor
                                                    .create( document.querySelector( '#editor' ) )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                            </script>
                                            

                                            @error('detalle')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                
                                

                            
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <button type="submit" class="btn btn-warning">Actualizar</button>                                            
                                            <a href="{{'/admin/historial'}}" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div> 
                    <!-- logo -->
                    {{-- <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="form group">
                                <label for="">Logo </label> <b>*</b>
                                <input type="file" value="{{old('logo')}}" class="form-control" name="logo" required id="file">
                                <br>
                                <center> <output id="list"></output></center>
                                <script>
                                    function archivo(evt) {
                                      var files = evt.target.files; // FileList object
                                      // Obtenemos la imagen del campo "file".
                                        for (var i = 0, f; f = files[i]; i++) {
                                            // Solo admitimos imágenes.
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function(theFile) {
                                                return function(e) {
                                                // Insertamos la imagen
                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                                    



                                @error('logo')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div> <!-- fin logo --> --}}
                </form> <!-- formulario -->
                </div> <!-- fin row  -->    
            </div>
        </div>

        

    </div>
@endsection