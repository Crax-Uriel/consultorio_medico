@extends('layouts.pinicio')
@section('titulo')
    Recuperar Contraseña 
@endsection

@section('content')

<div class="container-form register">
    <div class="information">
        <div class="info-childs">
            <a href=" {{url('/')}} " style="color: beige; "> <- </a><h2>Bienvenido</h2>
            <p>Para acceder a nuestro sistema, por favor inicia sesión</p>
            <img src="{{url('img/logo_consu.png')}}">
            <br>
            <input type="button" onclick="window.location.href='{{ url('login') }}'" value="Iniciar Sesion" id="sign-in">
        </div>
    </div>
    <div class="form-information">
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Restablecer contraseña</h2>
                <br>
                
                <form class="form form-login" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label >
                            <i class='bx bx-envelope' ></i>
                            <input id="email" type="email"  placeholder="Correo Electronico" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            
                        </label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                    </div>
                    
                    <b>

                        <input type="submit" value="Enviar enlace de restablecimiento de contraseña">
                    </b>
                    <br><br><br>
                    @if (session('status'))
                        <div style="color: green;" class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br><br><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
