<?php

use App\Livewire\Prueba;
use App\Livewire\Grupo\MostrarGrupos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrupoController;
use App\Livewire\Archivo\MostrarArchivos;
use App\Livewire\Carrera\MostrarCarreras;
use App\Livewire\Materia\MostrarMaterias;
use App\Livewire\Periodo\MostrarPeriodos;
use App\Livewire\Usuario\MostrarUsuarios;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\UsuarioController;
use App\Livewire\Actividad\MostrarActividad;
use App\Livewire\Actividad\MostrarActividades;
use App\Http\Controllers\docente\GrupoDocenteController;

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
    Route::get('/users', MostrarUsuarios::class)->name('users.index');
    Route::get('/users/create', [UsuarioController::class, 'create'])->name('users.create');
    Route::get('/users/{id}/edit', [UsuarioController::class, 'edit'])->name('users.edit');

    // Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
    // Route::get('/carreras/create', [CarreraController::class, 'create'])->name('carreras.create');
    // Route::post('/carreras/create', [CarreraController::class, 'store'])->name('carreras.store');
    // Route::get('/carreras/{carrera}/edit', [CarreraController::class, 'edit'])->name('carreras.edit');
    // Route::post('/carreras/{carrera}/edit', [CarreraController::class, 'update'])->name('carreras.update');
    // Route::delete('/carreras/{id}', [CarreraController::class, 'destroy'])->name('carreras.destroy');



    Route::get('/carreras', MostrarCarreras::class)->name('carreras');
    Route::get('/materias', MostrarMaterias::class)->name('materias');
    Route::get('/periodos', MostrarPeriodos::class)->name('periodos');
    Route::get('/actividades', MostrarActividades::class)->name('actividades');

    // administrador
    // Route::get('/grupos', MostrarGrupos::class)->name('grupos.index');
    Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
    // Route::get('/grupos/create', CrearGrupo::class)->name('grupos.create');
    Route::get('/grupos/{grupo}/edit', [GrupoController::class, 'edit'])->name('grupos.edit');
    Route::post('/grupos/{grupo}/update', [GrupoController::class, 'update'])->name('grupos.update');
    Route::get('/grupos/create', [GrupoController::class, 'create'])->name('grupos.create');
    Route::post('/grupos/store', [GrupoController::class, 'store'])->name('grupos.store');
    Route::delete('/grupos/{id}', [GrupoController::class, 'destroy'])->name('grupos.destroy');

    Route::get('/grupos/{grupo}/actividades/{actividad}', MostrarActividad::class)->name('actividades.show');
    Route::get('/grupos/{grupo}', [GrupoController::class, 'show'])->name('grupos.show');

    // docente
    Route::get('/docente/grupos', [GrupoDocenteController::class, 'index'])->name('docente.grupos.index');
    Route::get('/archivos', MostrarArchivos::class)->name('archivos.index');

});

