<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\DocenteGrupoController;
use App\Http\Controllers\Admin\ArchivoController;
use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\MateriaController;
use App\Http\Controllers\Admin\PeriodoController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Docente\DocenteController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Docente\DocenteGrupoActividadController;
use App\Http\Controllers\Jefe\JefeDocenciaController;
use App\Http\Controllers\NotificacionController;

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
    Route::get('/archivos', [ArchivoController::class, 'index'])->middleware('can:archivos.index')->name('archivos.index');
    Route::get('/archivos/{archivo}', [ArchivoController::class, 'show'])->middleware('can:archivos.index')->name('archivos.show');
    Route::post('/archivos/{archivo}', [ArchivoController::class, 'evaluar'])->middleware('can:archivos.evaluar')->name('archivos.evaluar');

    // Tablero del docente
    Route::get('/', DocenteController::class)->name('docentes.index'); 

    // Reportes por periodo
    Route::get('/reportes/', ReporteController::class)->middleware('can:reportes.index')->name('reportes.index'); 
    
    // Jefe
    Route::get('/jefe/firma/', [JefeDocenciaController::class, 'index'])->middleware('can:firma.index')->name('firma.index'); 
    Route::get('/jefe/firma/{archivo}', [JefeDocenciaController::class, 'show'])->middleware('can:firma.index')->name('firma.show');
    // Route::post('/jefe/firma/{archivo}', [JefeDocenciaController::class, 'evaluar'])->middleware('can:firma.evaluar')->name('firma.evaluar');
    // Route::post('/jefe/firma/{grupo}/{actividad}/subir/', [JefeDocenciaController::class, 'subir'])->name('docente.grupo.actividades.subir');

    
    // Grupos del docente
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

    // Notificaciones
    Route::get('/notificaciones', NotificacionController::class)->name('notificaciones');
});

