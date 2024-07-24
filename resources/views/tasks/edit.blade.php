@extends('layouts.app')

@section('title', 'Editando Tarea')

@section('content')
    <div class="container">
        <h1>Editando tarea ID: {{ $task->id }}</h1>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $task->name }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description">Descripción</label>
                <textarea name="description" id="description" cols="30" rows="10">{{ $task->description }}</textarea>
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
    <label for="priority" class="form-label">Prioridad</label>
    <select class="form-control" id="priority" name="priority" required>
        <option value="Baja" @if($task->priority == 'Baja') selected @endif>Baja</option>
        <option value="Media" @if($task->priority == 'Media') selected @endif>Media</option>
        <option value="Alta" @if($task->priority == 'Alta') selected @endif>Alta</option>
    </select>
</div>
            <div class="mb-3">
                <label for="completed" class="form-label">Completada</label>
                <select class="form-control" id="completed" name="completed" required>
                    <option value="0" @if($task->completed == 0) selected @endif>No</option>
                    <option value="1" @if($task->completed == 1) selected @endif>Sí</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Etiquetas</label>
                <select multiple class="form-control" id="tags" name="tags[]" size="3">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
                <!-- Aquí podrías agregar un campo de entrada para nuevas etiquetas si es necesario -->
                <input type="text" class="form-control mt-2" id="new_tags" name="new_tags[]" placeholder="Nueva etiqueta">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

