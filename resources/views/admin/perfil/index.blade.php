@extends('layouts.admin')

@section('title', 'Perfil de Usuario')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg p-4" style="width: 400px; border-radius: 15px; background: linear-gradient(135deg, #667eea, #4b5fa2); color: white; text-align: center;">
            <div class="card-body">
                <img src="https://th.bing.com/th/id/OIP.f4wLVIL_SURqRFpL7fdr2QHaHa?rs=1&pid=ImgDetMain" alt="Usuario" class="rounded-circle mb-3 border border-white" style="width: 100px; height: 100px; object-fit: cover;">
                <h3 class="fw-bold">{{ Auth::user()->name }}</h3>
                <p class="mb-1"><i class="bi bi-envelope"></i> {{ Auth::user()->email }}</p>
                <a href="{{ route('admin.perfil.edit', Auth::user()->id) }}" class="btn btn-light mt-3" style="border-radius: 25px;">Actualizar Datos</a>
                <a href="{{ route('logout') }}" class="btn btn-light mt-3" style="border-radius: 25px;">Cerrar Sesión</a>
            </div>
        </div>
    </div>
@endsection
