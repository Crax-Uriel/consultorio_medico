@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Registro de nuevas Configuraciones</h1>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>

                <div class="row">
                    <div class="col-md-8">  <!-- formulario -->
                        <form action="{{url('/admin/configuraciones/create')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Nombre del consultorio medico:</label> <b>*</b>
                                            <input type="text" class="form-control" name="nombre" required value="{{old('nombre')}}">
                                            @error('nombre')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form group">
                                                <label for="">Direccion del consultorio medico: </label> <b>*</b>
                                                <input type="address" value="{{old('direccion')}}" class="form-control" name="direccion" required>
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
                                            <label for="">Telefono: </label> <b>*</b>
                                            <input type="tel" value="{{old('telefono')}}" class="form-control" name="telefono" required>
                                            @error('telefono')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Correo electronico: </label> <b>*</b>
                                            <input type="email" value="{{old('correo')}}" class="form-control" name="correo" required>
                                            @error('correo')
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
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="{{'/admin/configuraciones'}}" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div> 

                    <div class="col-md-4"><!-- logo -->
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
                    </div> <!-- fin logo -->
                </form> <!-- formulario -->
                </div> <!-- fin row  -->    
            </div>
        </div>
    </div>
@endsection