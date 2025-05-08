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

        Permission::create(['name'=>'admin.configuracion.index'])->syncRoles($admin);
    }
}
