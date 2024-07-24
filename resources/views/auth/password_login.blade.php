@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <h1>Iniciar sesión</h1>
    
    <form method="POST" action="{{ route('password.login') }}">
        @csrf

        <input type="hidden" name="user_id" value="{{ $userId ?? '' }}">

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
@endsection
