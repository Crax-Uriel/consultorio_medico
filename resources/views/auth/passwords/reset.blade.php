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
                <form class="form form-login" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

            
                    <div>
                        <label >
                            <i class='bx bx-envelope' ></i>
                            <input id="email" type="email"  placeholder="Correo Electronico" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            
                            
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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña" >
                        </label>
                        @error('password')
                                <span class="invalid-feedback" role="alert"  >
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                        @enderror
                        <br>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt' ></i>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña" >
                        </label>
                        
                        <br>
                    </div>

                    
                    <b>
                        {{-- <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button> --}}

                        <input type="submit" value="Restablecer contraseña">
                    </b>
                    
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
                <div class="card-header">Restablecer ocnstraseña</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                    {{ __('Reset Password') }}
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
