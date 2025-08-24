<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\Admin\ArchivoController;
use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\MateriaController;
use App\Http\Controllers\Admin\PeriodoController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Docente\DocenteController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Admin\UsuarioRoleController;
use App\Http\Controllers\Jefe\JefeDocenciaController;
use App\Http\Controllers\Admin\UsuarioGrupoController;
use App\Http\Controllers\Docente\DocenteGrupoController;
use App\Http\Controllers\Docente\DocenteGrupoActividadController;

Route::middleware('guest')->group(function () {
    // Iniciar sesión
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

    // Panel administrativo
    Route::get('/', AdminController::class)->name('admin.index');

    // Tablero del docente
    Route::get('/docente', DocenteController::class)->name('docentes.index');

    // Gestion por parte del admin
    Route::get('/usuarios', UsuarioController::class)->middleware('can:usuarios.index')->name('usuarios.index');
    Route::get('/carreras', CarreraController::class)->middleware('can:carreras.index')->name('carreras.index');
    Route::get('/materias', MateriaController::class)->middleware('can:materias.index')->name('materias.index');
    Route::get('/periodos', PeriodoController::class)->middleware('can:periodos.index')->name('periodos.index');
    Route::get('/actividades', ActividadController::class)->middleware('can:actividades.index')->name('actividades.index');
    Route::get('/grupos/usuarios', [UsuarioGrupoController::class, 'index'])->name('grupos.usuarios.index');
    Route::resource('/grupos', GrupoController::class)->except('destroy', 'show')->names('grupos');

    // Asignar grupos a usuarios 
    Route::get('/grupos/usuarios/importar', [UsuarioGrupoController::class, 'formImportar'])->name('grupos.usuarios.formImportar');
    Route::post('/grupos/usuarios/importar', [UsuarioGrupoController::class, 'importarExcel'])->name('grupos.usuarios.importarExcel');

    // Ver los archivos subidos
    Route::get('/archivos', [ArchivoController::class, 'index'])->middleware('can:archivos.index')->name('archivos.index');
    Route::get('/archivos/{archivo}', [ArchivoController::class, 'show'])->middleware('can:archivos.index')->name('archivos.show');
    Route::post('/archivos/{archivo}', [ArchivoController::class, 'evaluar'])->middleware('can:archivos.evaluar')->name('archivos.evaluar');

    // Reportes por periodo
    Route::get('/reportes/', ReporteController::class)->middleware('can:reportes.index')->name('reportes.index');

    // Jefe
    Route::get('/jefe/firma/', [JefeDocenciaController::class, 'index'])->middleware('can:firma.index')->name('firma.index');
    Route::get('/jefe/firma/{archivo}', [JefeDocenciaController::class, 'show'])->middleware('can:firma.index')->name('firma.show');
    Route::post('/jefe/firma/{archivo}', [JefeDocenciaController::class, 'evaluar'])->middleware('can:firma.evaluar')->name('firma.evaluar');

    // Grupos del docente
    // Route::get('/docente/grupos', [DocenteGrupoController::class, 'index'])->middleware('can:docentes.index')->name('docente.grupos.index');
    // Route::get('/docente/grupos/{grupoUser}', [DocenteGrupoController::class, 'show'])->middleware('can:docentes.index')->name('docente.grupos.show');

    // Rutas para actividades del grupo del docente
    Route::get('/docente/grupo/{grupoUser}/actividades', [DocenteGrupoActividadController::class, 'index'])->name('docente.grupo.actividades.index');
    Route::get('/docente/grupo/{grupoUser}/actividades/{actividad}', [DocenteGrupoActividadController::class, 'show'])->name('docente.grupo.actividades.show');
    Route::post('/docente/grupo/{grupoUser}/actividades/{actividad}/subir', [DocenteGrupoActividadController::class, 'subir'])->name('docente.grupo.actividades.subir');

    // Gestion de roels
    Route::resource('roles', RoleController::class)->except(['show', 'destroy'])->names('roles');

    // Editar perfil
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Ver perfil
    Route::get('perfil/{usuario}', [ProfileController::class, 'show'])->name('profile.show');

    // Notificaciones
    Route::get('notificaciones', NotificacionController::class)->name('notificaciones.index');
    Route::get('notificaciones/cargar-mas', [NotificacionController::class, 'cargarMas'])->name('notificaciones.cargar-mas');

    Route::get('/archivo/ver/{archivo}/{nombre}', [ArchivoController::class, 'verArchivo'])->name('verArchivo');

    Route::delete('/comentario/eliminar/{comentario}', [ArchivoController::class, 'eliminarComentario'])->name('comentarios.destroy');

    Route::delete('/archivo/eliminar/{archivo}', [ArchivoController::class, 'eliminarArchivo'])->name('archivos.destroy');

    Route::get('/roles/usuario', [UsuarioRoleController::class, 'index'])->name('roles.usuario.index');
});
