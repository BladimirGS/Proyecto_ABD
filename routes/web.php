<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\RolUsuario;
use App\Livewire\Carrera\MostrarCarreras;
use App\Livewire\Materia\MostrarMaterias;
use App\Livewire\Periodo\MostrarPeriodos;
use App\Livewire\Prueba;
use App\Livewire\Usuario\MostrarUsuarios;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    // Iniciar sesión
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', Prueba::class)->name('dashboard');

    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

    // Gestion de usuarios
    Route::get('/users', MostrarUsuarios::class)->name('users');
    Route::get('/users/create', [UsuarioController::class, 'create'])->name('users.create');
    Route::get('/users/{id}/edit', [UsuarioController::class, 'edit'])->name('users.edit');

    Route::get('/carreras', MostrarCarreras::class)->name('carreras');
    Route::get('/materias', MostrarMaterias::class)->name('materias');
    Route::get('/periodos', MostrarPeriodos::class)->name('periodos');

});

