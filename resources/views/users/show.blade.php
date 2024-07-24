@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Correo Electrónico: {{ $user->email }}</p>
            
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Regresar a la Lista de Usuarios</a>

            <!-- Botón de eliminar -->
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
            </form>
        </div>
    </div>
</div>
@endsection
