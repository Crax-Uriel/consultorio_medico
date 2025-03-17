@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Modificar Configuracion de: {{$configuracion->nombre}}</h1>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                <form action="{{url('admin/configuraciones',$configuracion->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Nombre del consultorio medico:</label> <b>*</b>
                                            <input type="text" class="form-control" name="nombre" required value="{{$configuracion->nombre}}">
                                            @error('nombre')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

        
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Direccion del consultorio medico:</label>
                                            <input type="text" class="form-control" name="direccion" required value="{{$configuracion->direccion}}">
                                            @error('direccion')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Telefono del consultorio medico:</label>
                                            <input type="text" class="form-control" name="telefono" value="{{$configuracion->telefono}}">
                                            @error('telefono')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Correo electronico del consultorio medico:</label>
                                            <input type="text" class="form-control" name="correo" value="{{$configuracion->correo}}">
                                            @error('correo')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>


                                    </div>

                                </div>


                            
                            </div>

                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="" style="text-align: center">Logotipo:</label>
                                        <input type="file" value="{{old('logo')}}" class="form-control" name="logo" required id="file">
                                        <br>
                                        <center>
                                            <output id="list">
                                                <img src="{{url('storage/'.$configuracion ->logo)}}" alt="Logo" width="100px">
                                            </output>
                                        </center>
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                            
                        
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <button type="submit" class="btn btn-warning">Actualizar</button>

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