<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Livewire\Usuario\MostrarUsuarios;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
// Iniciar sesión
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');


// Cerrar sesión
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

// Gestion de usuarios
Route::get('/users', MostrarUsuarios::class)->name('users');
});