@extends('layouts.pinicio')
@section('titulo')
Registrarse
@endsection
@section('content')
<div class="container-form register">
    <div class="information">
        <div class="info-childs">
            <h2>Bienvenido</h2>
            <p>Si ya tienes una cuenta, inicia sesión con tus datos. 
            </p>
            <img src="{{url('img/logo_consu.png')}}">
            <input type="button" onclick="window.location.href='{{ url('login') }}'" value="Iniciar Sesion" id="sign-in">
        </div>
    </div>

    <div class="form-information">
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Registrarse</h2>
                <form class="form form-login" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>

                        <label >
                            <i class='bx bx-user-circle' ></i>
                            <input id="name" type="text" placeholder="Nombre de usuario" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        </label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                    </div>

                    <div>

                        <label >
                            <i class='bx bx-envelope' ></i>
                            <input id="email" type="email"  placeholder="Correo Electronico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            
                        </label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                    </div>



                    <div>
                        <label>
                            <i class='bx bx-lock-alt' ></i>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña" >


                        </label>
                        @error('password')
                                <span class="invalid-feedback" role="alert"  >
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                        @enderror
                        <br>
                    </div>


                    <div>
                        <label for="password-confirm">
                            <i class='bx bx-lock-alt' ></i>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                        </label>
                        
                        <br>
                    </div>


                    <div id="privacy-modal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
                        <div class="modal-content" style="background:#fff; padding:20px; width:50%; margin:10% auto; position:relative;">
                            <span id="close-modal" style="position:absolute; top:10px; right:20px; cursor:pointer;">&times;</span>
                            <h2>Acuerdos de Privacidad</h2>
                            <br>
                            <hr>
                            <br>
                            <p>1. Recopilación de Información
                                El consultorio recopila información personal proporcionada por los pacientes, incluyendo pero no limitado a:
                                <ul>
                                    <li> Nombre completo</li>
                                    <li> Número de teléfono</li>
                                    <li> Correo electrónico</li>
                                    <li> Historial médico y antecedentes clínicos</li>
                                </ul>
                            
                                </p>
                        </div>
                    </div>
                    
                    <div>
                            <input type="checkbox" id="privacy-policy">
                            Acepto el <a href="#" id="privacy-link">acuerdo de privacidad</a>.
                    </div>
                    <br>



                    <b>
                        <input type="submit" value="Registrase">
                    </b>
                    {{-- <br><br><br><br>
                    @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                ¿Olvidó su contraseña?
                            </a>
                    @endif --}}
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-login");
    const checkbox = document.getElementById("privacy-policy");
    const submitButton = form.querySelector("input[type='submit']");
    const modal = document.getElementById("privacy-modal");
    const modalClose = document.getElementById("close-modal");
    const modalTrigger = document.getElementById("privacy-link");

    form.addEventListener("submit", function(event) {
        if (!checkbox.checked) {
            event.preventDefault(); // Evita que el formulario se envíe
            alert("Debe aceptar el acuerdo de privacidad para continuar.");
        }
    });

    modalTrigger.addEventListener("click", function(event) {
        event.preventDefault();
        modal.style.display = "block";
    });

    modalClose.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});


    </script>

</div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
