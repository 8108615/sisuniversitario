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

//rutas para configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth','can:admin.configuracion.index');
Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth','can:admin.configuracion.store');

//Rutas para Gestiones
Route::get('/admin/gestiones', [App\Http\Controllers\GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth','can:admin.gestiones.index');
Route::get('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('auth','can:admin.gestiones.create');
Route::post('/admin/gestiones/create', [App\Http\Controllers\GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('auth','can:admin.gestiones.store');
Route::get('/admin/gestiones/{id}/edit', [App\Http\Controllers\GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth','can:admin.gestiones.edit');
Route::put('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth','can:admin.gestiones.update');
Route::delete('/admin/gestiones/{id}', [App\Http\Controllers\GestionController::class, 'destroy'])->name('admin.gestiones.destroy')->middleware('auth','can:admin.gestiones.destroy');

//Rutas para carreras
Route::get('/admin/carreras', [App\Http\Controllers\CarreraController::class, 'index'])->name('admin.carreras.index')->middleware('auth','can:admin.carreras.index');
Route::get('/admin/carreras/create', [App\Http\Controllers\CarreraController::class, 'create'])->name('admin.carreras.create')->middleware('auth','can:admin.carreras.create');
Route::post('/admin/carreras/create', [App\Http\Controllers\CarreraController::class, 'store'])->name('admin.carreras.store')->middleware('auth','can:admin.carreras.store');
Route::get('/admin/carreras/{id}/edit', [App\Http\Controllers\CarreraController::class, 'edit'])->name('admin.carreras.edit')->middleware('auth','can:admin.carreras.edit');
Route::put('/admin/carreras/{id}', [App\Http\Controllers\CarreraController::class, 'update'])->name('admin.carreras.update')->middleware('auth','can:admin.carreras.update');
Route::delete('/admin/carreras/{id}', [App\Http\Controllers\CarreraController::class, 'destroy'])->name('admin.carreras.destroy')->middleware('auth','can:admin.carreras.destroy');

//Rutas para niveles
Route::get('/admin/niveles', [App\Http\Controllers\NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth','can:admin.niveles.index');
Route::get('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'create'])->name('admin.niveles.create')->middleware('auth','can:admin.niveles.create');
Route::post('/admin/niveles/create', [App\Http\Controllers\NivelController::class, 'store'])->name('admin.niveles.store')->middleware('auth','can:admin.niveles.store');
Route::get('/admin/niveles/{id}/edit', [App\Http\Controllers\NivelController::class, 'edit'])->name('admin.niveles.edit')->middleware('auth','can:admin.niveles.edit');
Route::put('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth','can:admin.niveles.update');
Route::delete('/admin/niveles/{id}', [App\Http\Controllers\NivelController::class, 'destroy'])->name('admin.niveles.destroy')->middleware('auth','can:admin.niveles.destroy');

//Rutas para turnos
Route::get('/admin/turnos', [App\Http\Controllers\TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('auth','can:admin.turnos.index');
Route::get('/admin/turnos/create', [App\Http\Controllers\TurnoController::class, 'create'])->name('admin.turnos.create')->middleware('auth','admin.turnos.create');
Route::post('/admin/turnos/create', [App\Http\Controllers\TurnoController::class, 'store'])->name('admin.turnos.store')->middleware('auth','can:admin.turnos.store');
Route::get('/admin/turnos/{id}/edit', [App\Http\Controllers\TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('auth','can:admin.turnos.edit');
Route::put('/admin/turnos/{id}', [App\Http\Controllers\TurnoController::class, 'update'])->name('admin.turnos.update')->middleware('auth','can:admin.turnos.update');
Route::delete('/admin/turnos/{id}', [App\Http\Controllers\TurnoController::class, 'destroy'])->name('admin.turnos.destroy')->middleware('auth','can:admin.turnos.destroy');

//Rutas para paralelos
Route::get('/admin/paralelos', [App\Http\Controllers\ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('auth','can:admin.paralelos.index');
Route::get('/admin/paralelos/create', [App\Http\Controllers\ParaleloController::class, 'create'])->name('admin.paralelos.create')->middleware('auth','can:admin.paralelos.create');
Route::post('/admin/paralelos/create', [App\Http\Controllers\ParaleloController::class, 'store'])->name('admin.paralelos.store')->middleware('auth','can:admin.paralelos.store');
Route::get('/admin/paralelos/{id}/edit', [App\Http\Controllers\ParaleloController::class, 'edit'])->name('admin.paralelos.edit')->middleware('auth','can:admin.paralelos.edit');
Route::put('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'update'])->name('admin.paralelos.update')->middleware('auth','can:admin.paralelos.update');
Route::delete('/admin/paralelos/{id}', [App\Http\Controllers\ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy')->middleware('auth','can:admin.paralelos.destroy');

//Rutas para periodos
Route::get('/admin/periodos', [App\Http\Controllers\PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('auth','can:admin.periodos.index');
Route::get('/admin/periodos/create', [App\Http\Controllers\PeriodoController::class, 'create'])->name('admin.periodos.create')->middleware('auth','can:admin.periodos.create');
Route::post('/admin/periodos/create', [App\Http\Controllers\PeriodoController::class, 'store'])->name('admin.periodos.store')->middleware('auth','can:admin.periodos.store');
Route::get('/admin/periodos/{id}/edit', [App\Http\Controllers\PeriodoController::class, 'edit'])->name('admin.periodos.edit')->middleware('auth','can:admin.periodos.edit');
Route::put('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'update'])->name('admin.periodos.update')->middleware('auth','can:admin.periodos.update');
Route::delete('/admin/periodos/{id}', [App\Http\Controllers\PeriodoController::class, 'destroy'])->name('admin.periodos.destroy')->middleware('auth','can:admin.periodos.destroy');

//Rutas para materias
Route::get('/admin/materias', [App\Http\Controllers\MateriaController::class, 'index'])->name('admin.materias.index')->middleware('auth','can:admin.materias.index');
Route::get('/admin/materias/create', [App\Http\Controllers\MateriaController::class, 'create'])->name('admin.materias.create')->middleware('auth','can:admin.materias.create');
Route::post('/admin/materias/create', [App\Http\Controllers\MateriaController::class, 'store'])->name('admin.materias.store')->middleware('auth','can:admin.materias.store');
Route::get('/admin/materias/{id}/edit', [App\Http\Controllers\MateriaController::class, 'edit'])->name('admin.materias.edit')->middleware('auth','can:admin.materias.edit');
Route::put('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'update'])->name('admin.materias.update')->middleware('auth','can:admin.materias.update');
Route::delete('/admin/materias/{id}', [App\Http\Controllers\MateriaController::class, 'destroy'])->name('admin.materias.destroy')->middleware('auth','can:admin.materias.destroy');

//Rutas para roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth','can:admin.roles.index');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth','can:admin.roles.create');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth','can:admin.roles.store');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'permisos'])->name('admin.roles.permisos')->middleware('auth','can:admin.roles.permisos');
Route::post('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update_permisos'])->name('admin.roles.update_permisos')->middleware('auth','can:admin.roles.update_permisos');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth','can:admin.roles.edit');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth','can:admin.roles.update');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth','can:admin.roles.destroy');

//Rutas para administrativos
Route::get('/admin/administrativos', [App\Http\Controllers\AdministrativoController::class, 'index'])->name('admin.administrativos.index')->middleware('auth','can:admin.administrativos.index');
Route::get('/admin/administrativos/create', [App\Http\Controllers\AdministrativoController::class, 'create'])->name('admin.administrativos.create')->middleware('auth','can:admin.administrativos.create');
Route::post('/admin/administrativos/create', [App\Http\Controllers\AdministrativoController::class, 'store'])->name('admin.administrativos.store')->middleware('auth','can:admin.administrativos.store');
Route::get('/admin/administrativos/{id}', [App\Http\Controllers\AdministrativoController::class, 'show'])->name('admin.administrativos.show')->middleware('auth','can:admin.administrativos.show');
Route::get('/admin/administrativos/{id}/edit', [App\Http\Controllers\AdministrativoController::class, 'edit'])->name('admin.administrativos.edit')->middleware('auth','can:admin.administrativos.edit');
Route::put('/admin/administrativos/{id}', [App\Http\Controllers\AdministrativoController::class, 'update'])->name('admin.administrativos.update')->middleware('auth','can:admin.administrativos.update');
Route::delete('/admin/administrativos/{id}', [App\Http\Controllers\AdministrativoController::class, 'destroy'])->name('admin.administrativos.destroy')->middleware('auth','can:admin.administrativos.destroy');

//Rutas para docentes
Route::get('/admin/docentes', [App\Http\Controllers\DocenteController::class, 'index'])->name('admin.docentes.index')->middleware('auth','can:admin.docentes.index');
Route::get('/admin/docentes/create', [App\Http\Controllers\DocenteController::class, 'create'])->name('admin.docentes.create')->middleware('auth','can:admin.docentes.create');
Route::post('/admin/docentes/create', [App\Http\Controllers\DocenteController::class, 'store'])->name('admin.docentes.store')->middleware('auth','can:admin.docentes.store');
Route::get('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'show'])->name('admin.docentes.show')->middleware('auth','can:admin.docentes.show');
Route::get('/admin/docentes/{id}/edit', [App\Http\Controllers\DocenteController::class, 'edit'])->name('admin.docentes.edit')->middleware('auth','can:admin.docentes.edit');
Route::put('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'update'])->name('admin.docentes.update')->middleware('auth','can:admin.docentes.update');
Route::delete('/admin/docentes/{id}', [App\Http\Controllers\DocenteController::class, 'destroy'])->name('admin.docentes.destroy')->middleware('auth','can:admin.docentes.destroy');

//Rutas para docentes formacion
Route::post('/admin/docentes/createformacion/{id}', [App\Http\Controllers\DocenteFormacionController::class, 'store'])->name('admin.docentesformaciones.store')->middleware('auth','can:admin.docentesformaciones.store');
Route::delete('/admin/docentes/formacion/{id}', [App\Http\Controllers\DocenteFormacionController::class, 'destroy'])->name('admin.docentesformaciones.destroy')->middleware('auth','can:admin.docentesformaciones.destroy');

//Rutas para grupos academicos
Route::get('/admin/grupos_academicos', [App\Http\Controllers\GruposAcademicoController::class, 'index'])->name('admin.grupos_academicos.index')->middleware('auth','can:admin.grupos_academicos.index');
Route::get('/admin/grupos_academicos/create', [App\Http\Controllers\GruposAcademicoController::class, 'create'])->name('admin.grupos_academicos.create')->middleware('auth','can:admin.grupos_academicos.create');
Route::get('/admin/grupos_academicos/buscar_docente/{id}', [App\Http\Controllers\GruposAcademicoController::class, 'buscar_docente'])->name('admin.grupos_academicos.buscar_docente')->middleware('auth','can:admin.grupos_academicos.buscar_docente');
Route::post('/admin/grupos_academicos/create', [App\Http\Controllers\GruposAcademicoController::class, 'store'])->name('admin.grupos_academicos.store')->middleware('auth','can:admin.grupos_academicos.store');
Route::get('/admin/grupos_academicos/{id}/edit', [App\Http\Controllers\GruposAcademicoController::class, 'edit'])->name('admin.grupos_academicos.edit')->middleware('auth','can:admin.grupos_academicos.edit');
Route::put('/admin/grupos_academicos/{id}', [App\Http\Controllers\GruposAcademicoController::class, 'update'])->name('admin.grupos_academicos.update')->middleware('auth','can:admin.grupos_academicos.update');
Route::delete('/admin/grupos_academicos/{id}', [App\Http\Controllers\GruposAcademicoController::class, 'destroy'])->name('admin.grupos_academicos.destroy')->middleware('auth','can:admin.grupos_academicos.destroy');

//Rutas para horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index')->middleware('auth','can:admin.horarios.index');
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create')->middleware('auth','can:admin.horarios.create');
Route::get('/admin/horarios/buscar_grupo_academico/{id}', [App\Http\Controllers\HorarioController::class, 'buscar_grupo_academico'])->name('admin.horarios.buscar_docente')->middleware('auth','can:admin.horarios.buscar_docente');
Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store')->middleware('auth','can:admin.horarios.store');
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth','can:admin.horarios.edit');
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update')->middleware('auth','can:admin.horarios.update');
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth','can:admin.horarios.destroy');


//Rutas para estudiantes
Route::get('/admin/estudiantes', [App\Http\Controllers\EstudianteController::class, 'index'])->name('admin.estudiantes.index')->middleware('auth','can:admin.estudiantes.index');
Route::get('/admin/estudiantes/create', [App\Http\Controllers\EstudianteController::class, 'create'])->name('admin.estudiantes.create')->middleware('auth','can:admin.estudiantes.create');
Route::post('/admin/estudiantes/create', [App\Http\Controllers\EstudianteController::class, 'store'])->name('admin.estudiantes.store')->middleware('auth','can:admin.estudiantes.store');
Route::get('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'show'])->name('admin.estudiantes.show')->middleware('auth','can:admin.estudiantes.show');
Route::get('/admin/estudiantes/{id}/edit', [App\Http\Controllers\EstudianteController::class, 'edit'])->name('admin.estudiantes.edit')->middleware('auth','can:admin.estudiantes.edit');
Route::put('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'update'])->name('admin.estudiantes.update')->middleware('auth','can:admin.estudiantes.update');
Route::delete('/admin/estudiantes/{id}', [App\Http\Controllers\EstudianteController::class, 'destroy'])->name('admin.estudiantes.destroy')->middleware('auth','can:admin.estudiantes.destroy');

//Rutas para matriculaciones
Route::get('/admin/matriculaciones', [App\Http\Controllers\MatriculacionController::class, 'index'])->name('admin.matriculaciones.index')->middleware('auth','can:admin.matriculaciones.index');
Route::get('/admin/matriculaciones/create', [App\Http\Controllers\MatriculacionController::class, 'create'])->name('admin.matriculaciones.create')->middleware('auth','can:admin.matriculaciones.create');
Route::post('/admin/matriculaciones/create', [App\Http\Controllers\MatriculacionController::class, 'store'])->name('admin.matriculaciones.store')->middleware('auth','can:admin.matriculaciones.store');
Route::get('/admin/matriculaciones/{id}', [App\Http\Controllers\MatriculacionController::class, 'show'])->name('admin.matriculaciones.show')->middleware('auth','can:admin.matriculaciones.show');
Route::get('/admin/matriculaciones/pdf/{id}', [App\Http\Controllers\MatriculacionController::class, 'pdf_matricula'])->name('admin.matriculaciones.pdf_matricula')->middleware('auth','can:admin.matriculaciones.pdf_matricula');
Route::get('/admin/matriculaciones/{id}/edit', [App\Http\Controllers\MatriculacionController::class, 'edit'])->name('admin.matriculaciones.edit')->middleware('auth','can:admin.matriculaciones.edit');
Route::put('/admin/matriculaciones/{id}', [App\Http\Controllers\MatriculacionController::class, 'update'])->name('admin.matriculaciones.update')->middleware('auth','can:admin.matriculaciones.update');
Route::delete('/admin/matriculaciones/{id}', [App\Http\Controllers\MatriculacionController::class, 'destroy'])->name('admin.matriculaciones.destroy')->middleware('auth','can:admin.matriculaciones.destroy');

Route::get('/admin/matriculaciones/buscar_estudiante/{id}', [App\Http\Controllers\MatriculacionController::class, 'buscar_estudiante'])->name('admin.matriculaciones.buscar_estudiante')->middleware('auth','can:admin.matriculaciones.buscar_estudiante');

//Rutas para asignacion de Materias
Route::post('/admin/matriculaciones/asignar_materia/create', [App\Http\Controllers\AsignacionMateriaController::class, 'store'])->name('admin.asignar_materia.store')->middleware('auth','can:admin.asignar_materia.store');
Route::delete('/admin/matriculaciones/asignar_materia/{id}', [App\Http\Controllers\AsignacionMateriaController::class, 'destroy'])->name('admin.asignar_materia.destroy')->middleware('auth','can:admin.asignar_materia.destroy');

//Rutas para pagos
Route::get('/admin/pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('admin.pagos.index')->middleware('auth','can:admin.pagos.index');
Route::get('/admin/pagos/estudiante/{id}', [App\Http\Controllers\PagoController::class, 'ver_pagos'])->name('admin.pagos.ver_pagos')->middleware('auth','can:admin.pagos.ver_pagos');
Route::post('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'store'])->name('admin.pagos.store')->middleware('auth','can:admin.pagos.store');
Route::get('/admin/pagos/comprobante/{id}', [App\Http\Controllers\PagoController::class, 'comprobante'])->name('admin.pagos.comprobante')->middleware('auth','can:admin.pagos.comprobante');
Route::delete('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('admin.pagos.destroy')->middleware('auth','can:admin.pagos.destroy');

//Rutas para Asistencias
Route::get('/admin/asistencias', [App\Http\Controllers\AsistenciaController::class, 'index'])->name('admin.asistencias.index')->middleware('auth','can:admin.asistencias.index');
