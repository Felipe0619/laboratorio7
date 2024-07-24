<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Tareas - @yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            margin-bottom: 20px;
            padding: 10px 0;
            background-color: #343a40;
            color: white;
            text-align: center;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>

<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img">
                    <title>Bootstrap</title>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.942-11.153-2.003-6.485-2.281-14.437-2.066-20.577C105.214 5.893 100.233 0 93.5 0h-69zM79.346 28.528c0 4.746-3.97 8.319-9.665 8.319H55.464v-16.64h14.201c5.694 0 9.665 3.572 9.665 8.32zm-30.074 0c0-4.748-3.97-8.32-9.664-8.32H26.525v16.64h13.084c5.694 0 9.664-3.573 9.664-8.32zm0 27.944c0 4.746-3.97 8.319-9.664 8.319H26.525V48.151h13.084c5.694 0 9.664 3.573 9.664 8.32zm21.889 8.32h14.217c5.694 0 9.665-3.573 9.665-8.32 0-4.747-3.97-8.32-9.665-8.32H55.464v16.64zM26.525 55.472c0 4.747 3.97 8.32 9.664 8.32h14.217V48.151H36.189c-5.694 0-9.664 3.573-9.664 8.32zM68.905 63.792c5.694 0 9.665-3.573 9.665-8.32 0-4.747-3.97-8.32-9.665-8.32H55.464v16.64h13.441z" fill="currentColor"></path>
                </svg>
                <span class="fs-4">App Tareas</span>
            </a>
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">Inicio</a>
                <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/users">Ver Usuarios</a>
                @auth
                    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/tasks">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link py-2 link-body-emphasis text-decoration-none" style="text-decoration: none;">Cerrar sesión</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="pt-3 mt-4 text-body-secondary border-top">
        &copy; 2024 App Tareas, Inc.
    </footer>
</div>
</body>
</html>
