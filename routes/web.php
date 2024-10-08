<?php

use App\Http\Controllers\Admin\ActividadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\ArchivoController;
use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\MateriaController;
use App\Http\Controllers\Admin\PeriodoController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Docente\DocenteController;
use App\Http\Controllers\Docente\DocenteGrupoActividadController;
use App\Http\Controllers\Docente\DocenteGrupoController;
use App\Http\Controllers\Profile\ProfileController;

Route::middleware('guest')->group(function () {
    // Iniciar sesión
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

    // Gestion por parte del admin
    Route::get('/usuarios', UsuarioController::class)->middleware('can:usuarios.index')->name('usuarios.index');
    Route::get('/carreras', CarreraController::class)->middleware('can:carreras.index')->name('carreras.index');
    Route::get('/materias', MateriaController::class)->middleware('can:materias.index')->name('materias.index');
    Route::get('/periodos', PeriodoController::class)->middleware('can:periodos.index')->name('periodos.index');
    Route::get('/actividades', ActividadController::class)->middleware('can:actividades.index')->name('actividades.index');
    Route::resource('/grupos', GrupoController::class)->except('destroy')->names('grupos');
    
    // Ver los archivos subidos
    Route::get('/archivos', ArchivoController::class)->middleware('can:reportes.index')->name('archivos.index');

    // Tablero del docente
    Route::get('/', DocenteController::class)->name('docentes.index'); 

    // Reportes por periodo
    Route::get('/reportes/', ReporteController::class)->middleware('can:reportes.index')->name('reportes.index'); 
    
    // Grupos del docente
    // Route::resource('/docente/grupos', DocenteGrupoController::class)->except('destroy')->names('docente.grupos');
    Route::get('/docente/grupos', [DocenteGrupoController::class, 'index'])->name('docente.grupos.index');
    Route::get('/docente/grupos/{grupo}', [DocenteGrupoController::class, 'show'])->name('docente.grupos.show');
    
    // Rutas para actividades del grupo del docente
    Route::get('/docente/grupos/{grupo}/actividades', [DocenteGrupoActividadController::class, 'index'])->name('docente.grupo.actividades.index');
    Route::get('/docente/grupos/{grupo}/actividades/{actividad}', [DocenteGrupoActividadController::class, 'show'])->name('docente.grupo.actividades.show');
    Route::get('/docente/grupos/{grupo}/actividades/{actividad}/descargar/{archivo}', [DocenteGrupoActividadController::class, 'descargar'])->name('docente.grupo.actividades.descargar');
    Route::post('/docente/grupos/{grupo}/actividades/{actividad}/subir/', [DocenteGrupoActividadController::class, 'subir'])->name('docente.grupo.actividades.subir');

    // Gestion de roels
    Route::resource('roles', RoleController::class)->except(['show', 'destroy'])->names('roles');
    
    // Editar perfil
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Ver perfil
    Route::get('perfil/{usuario}', [ProfileController::class, 'show'])->name('profile.show');
});

