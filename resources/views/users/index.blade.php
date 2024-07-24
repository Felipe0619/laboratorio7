@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h1>Usuarios</h1>
    
    <!-- Botón para crear un nuevo usuario -->
    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-success">Crear Usuario</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Botón para ver detalles del usuario -->
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Ver</a>

                        <!-- Botón para iniciar sesión como el usuario -->
                        <form action="{{ route('login') }}" method="GET" style="display:inline;">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary btn-sm">Iniciar sesión</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

