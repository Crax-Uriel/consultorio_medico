@extends('layouts.admin')

@section('title', 'Editar Perfil')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="m-0">Modificar mi Perfil</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.perfil.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nombre de Usuario <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shadow-sm" name="name" required value="{{ $usuario->name }}">
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                            <input type="email" class="form-control shadow-sm" name="email" required value="{{ $usuario->email }}">
                            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña (opcional)</label>
                            <input type="password" class="form-control shadow-sm" name="password">
                            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control shadow-sm" name="password_confirmation">
                            @error('password_confirmation')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.perfil.index') }}" class="btn btn-secondary shadow-sm">Cancelar</a>
                            <button type="submit" class="btn btn-warning shadow-sm">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
