@extends('layouts.app')

@section('title', 'Tareas')

@section('content')
    <h1>Tareas</h1>

    <div class="mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Crear Tarea</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Prioridad</th>
                <th>Completada</th>
                <th>Usuario</th> <!-- Nueva columna para el nombre del usuario -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->completed ? 'Sí' : 'No' }}</td>
                    <td>{{ $task->user->name }}</td> <!-- Mostrar el nombre del usuario -->
                    <td>
                        <!-- Botón para ver detalles de la tarea -->
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">Ver</a>

                        <!-- Botón para editar la tarea -->
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <!-- Formulario para completar la tarea -->
                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Completar</button>
                        </form>

                        <!-- Formulario para eliminar la tarea -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
