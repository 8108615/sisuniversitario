<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=>'ADMINISTRADOR']);
        $administrativo = Role::create(['name'=>'ADMINISTRATIVO']);
        $docente = Role::create(['name'=>'DOCENTE']);
        $estudiante = Role::create(['name'=>'ESTUDIANTE']);
        $cajero = Role::create(['name'=>'CAJERO']);



        // ----- Configiuraciones -----------
        Permission::create(['name'=>'admin.configuracion.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuracion.store'])->syncRoles($admin);

        // Gestiones
        Permission::create(['name'=>'admin.gestiones.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.gestiones.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.gestiones.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.gestiones.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.gestiones.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.gestiones.destroy'])->syncRoles($admin);

        //Rutas para carreras
        Permission::create(['name'=>'admin.carreras.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.carreras.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.carreras.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.carreras.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.carreras.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.carreras.destroy'])->syncRoles($admin);

        //Rutas para niveles
        Permission::create(['name'=>'admin.niveles.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.niveles.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.niveles.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.niveles.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.niveles.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.niveles.destroy'])->syncRoles($admin);
        

        //Rutas para turnos
        Permission::create(['name'=>'admin.turnos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.turnos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.turnos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.turnos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.turnos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.turnos.destroy'])->syncRoles($admin);

        //Rutas para paralelos
        Permission::create(['name'=>'admin.paralelos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.paralelos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.paralelos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.paralelos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.paralelos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.paralelos.destroy'])->syncRoles($admin);

        //Rutas para periodos
        Permission::create(['name'=>'admin.periodos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.destroy'])->syncRoles($admin);

        //Rutas para materias
        Permission::create(['name'=>'admin.materias.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.destroy'])->syncRoles($admin);

        //Rutas para roles
        Permission::create(['name'=>'admin.roles.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.permisos'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.update_permisos'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.destroy'])->syncRoles($admin);
        

        //Rutas para administrativos
        Permission::create(['name'=>'admin.administrativos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.destroy'])->syncRoles($admin);

        //Rutas para docentes
        Permission::create(['name'=>'admin.docentes.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.destroy'])->syncRoles($admin);

        //Rutas para docentes formacion
        Permission::create(['name'=>'admin.docentesformaciones.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentesformaciones.destroy'])->syncRoles($admin);

        //Rutas para grupos academicos
        Permission::create(['name'=>'admin.grupos_academicos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.buscar_docente'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.destroy'])->syncRoles($admin);

        //Rutas para horarios
        Permission::create(['name'=>'admin.horarios.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.buscar_docente'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.destroy'])->syncRoles($admin);

        //Rutas para estudiantes
        Permission::create(['name'=>'admin.estudiantes.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.destroy'])->syncRoles($admin);

        //Rutas para matriculaciones
        Permission::create(['name'=>'admin.matriculaciones.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.matriculaciones.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.matriculaciones.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.matriculaciones.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.matriculaciones.pdf_matricula'])->syncRoles($admin);
        Permission::create(['name'=>'admin.matriculaciones.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.matriculaciones.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.matriculaciones.destroy'])->syncRoles($admin);

        Permission::create(['name'=>'admin.matriculaciones.buscar_estudiante'])->syncRoles($admin);

        //Rutas para asignacion de Materias
        Permission::create(['name'=>'admin.asignar_materia.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.asignar_materia.destroy'])->syncRoles($admin);

        //Rutas para asignacion de Pagos
        Permission::create(['name'=>'admin.pagos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.pagos.ver_pagos'])->syncRoles($admin);
        Permission::create(['name'=>'admin.pagos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.pagos.comprobante'])->syncRoles($admin);
        Permission::create(['name'=>'admin.pagos.destroy'])->syncRoles($admin);

        //Rutas para asignacion de Asistencias
        Permission::create(['name'=>'admin.asistencias.index'])->syncRoles($admin,$docente,$estudiante);
        Permission::create(['name'=>'admin.asistencias.create'])->syncRoles($docente);
        Permission::create(['name'=>'admin.asistencias.store'])->syncRoles($docente);
        Permission::create(['name'=>'admin.asistencias.destroy'])->syncRoles($docente);
        Permission::create(['name'=>'admin.asistencias.show_admin'])->syncRoles($admin);
        Permission::create(['name'=>'admin.asistencias.show_estudiante'])->syncRoles($estudiante);


        












        











        







        








        
    }
}
