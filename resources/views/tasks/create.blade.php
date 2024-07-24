@extends('layouts.app')

@section('title', 'Crear Tarea')

@section('content')
    <div class="container">
        <h1>Crear Tarea</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="priority">Prioridad</label>
                <select id="priority" name="priority" required>
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="completed" class="form-label">Completada</label>
                <select class="form-control" id="completed" name="completed">
                    <option value="">Seleccionar...</option>
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>
      
            <div class="mb-3">
                <label for="tags" class="form-label">Etiquetas</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                <!-- Aquí podrías agregar un campo de entrada para nuevas etiquetas si es necesario -->
                <input type="text" class="form-control mt-2" id="new_tags" name="new_tags[]" placeholder="Nueva etiqueta">
            </div>

    <button type="submit" class="btn btn-primary">Crear</button>
</form>
    </div>
@endsection
