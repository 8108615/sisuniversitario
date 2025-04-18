<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes();

Route::get('/register', function () {
    abort(403,'Registro no permitido');
})->name('register');

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth');

//Rutas para Gestiones
Route::get('/admin/gestiones', [App\Http\Controllers\GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth');
Route::get('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('auth');
Route::post('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('auth');
Route::get('/admin/gestiones/{id}/edit', [App\Http\Controllers\GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth');
Route::put('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth');
Route::delete('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'destroy'])->name('admin.gestiones.destroy')->middleware('auth');

//Rutas para carreras
Route::get('/admin/carreras', [App\Http\Controllers\CarreraController::class, 'index'])->name('admin.carreras.index')->middleware('auth');
Route::get('/admin/carreras/create', [App\Http\Controllers\CarreraController::class, 'create'])->name('admin.carreras.create')->middleware('auth');
Route::post('/admin/carreras/create', [App\Http\Controllers\CarreraController::class, 'store'])->name('admin.carreras.store')->middleware('auth');
Route::get('/admin/carreras/{id}/edit', [App\Http\Controllers\CarreraController::class, 'edit'])->name('admin.carreras.edit')->middleware('auth');
Route::put('/admin/carreras/{id}', [App\Http\Controllers\CarreraController::class, 'update'])->name('admin.carreras.update')->middleware('auth');
Route::delete('/admin/carreras/{id}', [App\Http\Controllers\CarreraController::class, 'destroy'])->name('admin.carreras.destroy')->middleware('auth');

//Rutas para niveles
Route::get('/admin/niveles', [App\Http\Controllers\NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth');
Route::get('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'create'])->name('admin.niveles.create')->middleware('auth');
Route::post('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'store'])->name('admin.niveles.store')->middleware('auth');
Route::get('/admin/niveles/{id}/edit', [App\Http\Controllers\NivelController::class, 'edit'])->name('admin.niveles.edit')->middleware('auth');
Route::put('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth');
Route::delete('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'destroy'])->name('admin.niveles.destroy')->middleware('auth');

//Rutas para turnos
Route::get('/admin/turnos', [App\Http\Controllers\TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('auth');
Route::get('/admin/turnos/create', [App\Http\Controllers\TurnoController::class, 'create'])->name('admin.turnos.create')->middleware('auth');
Route::post('/admin/turnos/create', [App\Http\Controllers\TurnoController::class, 'store'])->name('admin.turnos.store')->middleware('auth');
Route::get('/admin/turnos/{id}/edit', [App\Http\Controllers\TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('auth');
Route::put('/admin/turnos/{id}', [App\Http\Controllers\TurnoController::class, 'update'])->name('admin.turnos.update')->middleware('auth');
Route::delete('/admin/turnos/{id}', [App\Http\Controllers\TurnoController::class, 'destroy'])->name('admin.turnos.destroy')->middleware('auth');

//Rutas para paralelos
Route::get('/admin/paralelos', [App\Http\Controllers\ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('auth');
Route::get('/admin/paralelos/create', [App\Http\Controllers\ParaleloController::class, 'create'])->name('admin.paralelos.create')->middleware('auth');
Route::post('/admin/paralelos/create', [App\Http\Controllers\ParaleloController::class, 'store'])->name('admin.paralelos.store')->middleware('auth');
Route::get('/admin/paralelos/{id}/edit', [App\Http\Controllers\ParaleloController::class, 'edit'])->name('admin.paralelos.edit')->middleware('auth');
Route::put('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'update'])->name('admin.paralelos.update')->middleware('auth');
Route::delete('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy')->middleware('auth');

//Rutas para periodos
Route::get('/admin/periodos', [App\Http\Controllers\PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('auth');
Route::get('/admin/periodos/create', [App\Http\Controllers\PeriodoController::class, 'create'])->name('admin.periodos.create')->middleware('auth');
Route::post('/admin/periodos/create', [App\Http\Controllers\PeriodoController::class, 'store'])->name('admin.periodos.store')->middleware('auth');
Route::get('/admin/periodos/{id}/edit', [App\Http\Controllers\PeriodoController::class, 'edit'])->name('admin.periodos.edit')->middleware('auth');
Route::put('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'update'])->name('admin.periodos.update')->middleware('auth');
Route::delete('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'destroy'])->name('admin.periodos.destroy')->middleware('auth');

//Rutas para materias
Route::get('/admin/materias', [App\Http\Controllers\MateriaController::class, 'index'])->name('admin.materias.index')->middleware('auth');
Route::get('/admin/materias/create', [App\Http\Controllers\MateriaController::class, 'create'])->name('admin.materias.create')->middleware('auth');
Route::post('/admin/materias/create', [App\Http\Controllers\MateriaController::class, 'store'])->name('admin.materias.store')->middleware('auth');
Route::get('/admin/materias/{id}/edit', [App\Http\Controllers\MateriaController::class, 'edit'])->name('admin.materias.edit')->middleware('auth');
Route::put('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'update'])->name('admin.materias.update')->middleware('auth');
Route::delete('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'destroy'])->name('admin.materias.destroy')->middleware('auth');

//Rutas para roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

//Rutas para administrativos
Route::get('/admin/administrativos', [App\Http\Controllers\AdministrativoController::class, 'index'])->name('admin.administrativos.index')->middleware('auth');
Route::get('/admin/administrativos/create', [App\Http\Controllers\AdministrativoController::class, 'create'])->name('admin.administrativos.create')->middleware('auth');
Route::post('/admin/administrativos/create', [App\Http\Controllers\AdministrativoController::class, 'store'])->name('admin.administrativos.store')->middleware('auth');
Route::get('/admin/administrativos/{id}', [App\Http\Controllers\AdministrativoController::class, 'show'])->name('admin.administrativos.show')->middleware('auth');
Route::get('/admin/administrativos/{id}/edit', [App\Http\Controllers\AdministrativoController::class, 'edit'])->name('admin.administrativos.edit')->middleware('auth');
Route::put('/admin/administrativos/{id}', [App\Http\Controllers\AdministrativoController::class, 'update'])->name('admin.roles.administrativos')->middleware('auth');
Route::delete('/admin/administrativos/{id}', [App\Http\Controllers\AdministrativoController::class, 'destroy'])->name('admin.administrativos.destroy')->middleware('auth');

//Rutas para docentes
Route::get('/admin/docentes', [App\Http\Controllers\DocenteController::class, 'index'])->name('admin.docentes.index')->middleware('auth');
Route::get('/admin/docentes/create', [App\Http\Controllers\DocenteController::class, 'create'])->name('admin.docentes.create')->middleware('auth');
Route::post('/admin/docentes/create', [App\Http\Controllers\DocenteController::class, 'store'])->name('admin.docentes.store')->middleware('auth');
Route::get('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'show'])->name('admin.docentes.show')->middleware('auth');
Route::get('/admin/docentes/{id}/edit', [App\Http\Controllers\DocenteController::class, 'edit'])->name('admin.docentes.edit')->middleware('auth');
Route::put('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'update'])->name('admin.docentes.update')->middleware('auth');
Route::delete('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'destroy'])->name('admin.docentes.destroy')->middleware('auth');

//Rutas para docentes formacion
Route::post('/admin/docentes/createformacion/{id}', [App\Http\Controllers\DocenteFormacionController::class, 'store'])->name('admin.docentesformaciones.store')->middleware('auth');
Route::delete('/admin/docentes/formacion/{id}', [App\Http\Controllers\DocenteFormacionController::class, 'destroy'])->name('admin.docentesformaciones.destroy')->middleware('auth');

//Rutas para grupos academicos
Route::get('/admin/grupos_academicos', [App\Http\Controllers\GruposAcademicoController::class, 'index'])->name('admin.grupos_academicos.index')->middleware('auth');
Route::get('/admin/grupos_academicos/create', [App\Http\Controllers\GruposAcademicoController::class, 'create'])->name('admin.grupos_academicos.create')->middleware('auth');
Route::get('/admin/grupos_academicos/buscar_docente/{id}', [App\Http\Controllers\GruposAcademicoController::class, 'buscar_docente'])->name('admin.grupos_academicos.buscar_docente')->middleware('auth');
Route::post('/admin/grupos_academicos/create', [App\Http\Controllers\GruposAcademicoController::class, 'store'])->name('admin.grupos_academicos.store')->middleware('auth');
Route::get('/admin/grupos_academicos/{id}/edit', [App\Http\Controllers\GruposAcademicoController::class, 'edit'])->name('admin.grupos_academicos.edit')->middleware('auth');
Route::put('/admin/grupos_academicos/{id}', [App\Http\Controllers\GruposAcademicoController::class, 'update'])->name('admin.grupos_academicos.update')->middleware('auth');
Route::delete('/admin/grupos_academicos/{id}', [App\Http\Controllers\GruposAcademicoController::class, 'destroy'])->name('admin.grupos_academicos.destroy')->middleware('auth');


//Rutas para estudiantes
Route::get('/admin/estudiantes', [App\Http\Controllers\EstudianteController::class, 'index'])->name('admin.estudiantes.index')->middleware('auth');
Route::get('/admin/estudiantes/create', [App\Http\Controllers\EstudianteController::class, 'create'])->name('admin.estudiantes.create')->middleware('auth');
Route::post('/admin/estudiantes/create', [App\Http\Controllers\EstudianteController::class, 'store'])->name('admin.estudiantes.store')->middleware('auth');
Route::get('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'show'])->name('admin.estudiantes.show')->middleware('auth');
Route::get('/admin/estudiantes/{id}/edit', [App\Http\Controllers\EstudianteController::class, 'edit'])->name('admin.estudiantes.edit')->middleware('auth');
Route::put('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'update'])->name('admin.estudiantes.update')->middleware('auth');
Route::delete('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'destroy'])->name('admin.estudiantes.destroy')->middleware('auth');

//Rutas para matriculaciones
Route::get('/admin/matriculaciones', [App\Http\Controllers\MatriculacionController::class, 'index'])->name('admin.matriculaciones.index')->middleware('auth');
Route::get('/admin/matriculaciones/create', [App\Http\Controllers\MatriculacionController::class, 'create'])->name('admin.matriculaciones.create')->middleware('auth');
Route::post('/admin/matriculaciones/create', [App\Http\Controllers\MatriculacionController::class, 'store'])->name('admin.matriculaciones.store')->middleware('auth');
Route::get('/admin/matriculaciones/{id}', [App\Http\Controllers\MatriculacionController::class, 'show'])->name('admin.matriculaciones.show')->middleware('auth');
Route::get('/admin/matriculaciones/pdf/{id}', [App\Http\Controllers\MatriculacionController::class, 'pdf_matricula'])->name('admin.matriculaciones.pdf_matricula')->middleware('auth');
Route::get('/admin/matriculaciones/{id}/edit', [App\Http\Controllers\MatriculacionController::class, 'edit'])->name('admin.matriculaciones.edit')->middleware('auth');
Route::put('/admin/matriculaciones/{id}', [App\Http\Controllers\MatriculacionController::class, 'update'])->name('admin.matriculaciones.update')->middleware('auth');
Route::delete('/admin/matriculaciones/{id}', [App\Http\Controllers\MatriculacionController::class, 'destroy'])->name('admin.matriculaciones.destroy')->middleware('auth');

Route::get('/admin/matriculaciones/buscar_estudiante/{id}', [App\Http\Controllers\MatriculacionController::class, 'buscar_estudiante'])->name('admin.matriculaciones.buscar_estudiante')->middleware('auth');

//Rutas para asignacion de Materias
Route::post('/admin/matriculaciones/asignar_materia/create', [App\Http\Controllers\AsignacionMateriaController::class, 'store'])->name('admin.asignar_materia.store')->middleware('auth');
Route::delete('/admin/matriculaciones/asignar_materia/{id}', [App\Http\Controllers\AsignacionMateriaController::class, 'destroy'])->name('admin.asignar_materia.destroy')->middleware('auth');
Route::delete('/admin/matriculaciones/asignar_materia/{id}', [App\Http\Controllers\AsignacionMateriaController::class, 'destroy'])->name('admin.asignar_materia.destroy')->middleware('auth');

//Rutas para grupos_academicos