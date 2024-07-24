{{-- resources/views/tasks/show.blade.php --}}
<h1>Tarea ID: {{ $task->id }}</h1>
<hr>
<h2>{{ $task->name }}</h2>
<p>Descripción: {{ $task->description }}</p>

<div>
    @if ($task->user)
        <p>Asignado a: {{ $task->user->name }}</p>
        <!-- Puedes mostrar más detalles del usuario si es necesario -->
    @else
        <p>Esta tarea no tiene un usuario asignado.</p>
    @endif
</div>

@if ($task->tags->isNotEmpty())
    <div>
        <p>Etiquetas:</p>
        <ul>
            @foreach ($task->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
@endif
