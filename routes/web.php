<?php


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Rutas públicas (sin autenticación)
Route::get('/', [UserController::class, 'index'])->name('users.index'); // Lista de usuarios

// Registro y autenticación
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Nueva ruta para el formulario de login solo con contraseña
Route::get('/password-login', [LoginController::class, 'showPasswordLoginForm'])->name('password.login.form');
Route::post('/password-login', [LoginController::class, 'passwordLogin'])->name('password.login');

// Rutas de usuarios disponibles sin autenticación
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Rutas para tareas
    Route::resource('tasks', TaskController::class); // CRUD completo para tareas
    
    // Ruta para completar una tarea
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    
    // Rutas de usuarios
    Route::resource('users', UserController::class)->except(['create', 'store']); // CRUD completo para usuarios
    
    // Ruta para ver tareas de un usuario específico
    Route::get('/tasks/user/{user}', [TaskController::class, 'index'])->name('tasks.user');
    
    // Ruta de inicio
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
