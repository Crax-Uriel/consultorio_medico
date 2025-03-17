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
