<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:roles',
        ]);

        $rol = new Role();
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('admin.roles.index')
                ->with('mensaje','Se Registro el Rol de la Manera Correcta')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function permisos($id){
        $rol = Role::find($id);
        $permisos = Permission::all()->groupBy(function($permiso){
            if(stripos($permiso->name,'configuracion')!== false){ return 'Configuracion';}
            if(stripos($permiso->name,'gestiones')!== false){ return 'Gestiones';}
            if(stripos($permiso->name,'carreras')!== false){ return 'Carreras';}
            if(stripos($permiso->name,'niveles')!== false){ return 'Niveles';}
            if(stripos($permiso->name,'turnos')!== false){ return 'Turnos';}
            if(stripos($permiso->name,'paralelos')!== false){ return 'Paralelos';}
            if(stripos($permiso->name,'periodos')!== false){ return 'Periodos';}
            if(stripos($permiso->name,'materias')!== false){ return 'Materias';}
            if(stripos($permiso->name,'roles')!== false){ return 'Roles';}
            if(stripos($permiso->name,'administrativos')!== false){ return 'Administrativos';}
            if(stripos($permiso->name,'docentes')!== false){ return 'Docentes';}
            if(stripos($permiso->name,'docentesformaciones')!== false){ return 'Docentes Formaciones';}
            if(stripos($permiso->name,'grupos_academicos')!== false){ return 'Grupos Academicos';}
            if(stripos($permiso->name,'horarios')!== false){ return 'Horarios';}
            if(stripos($permiso->name,'estudiantes')!== false){ return 'Estudiantes';}
            if(stripos($permiso->name,'matriculaciones')!== false){ return 'Matriculaciones';}
            if(stripos($permiso->name,'asignar_materia')!== false){ return 'Asignar Materias';}
            if(stripos($permiso->name,'pagos')!== false){ return 'Pagos';}
            

        });

        return view('admin.roles.permisos',compact('permisos','rol'));
    }

    public function update_permisos(Request $request, $id){
        $rol = Role::find($id);
        $rol->permissions()->sync($request->input('permisos'));

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Se Modificaron los Permisos de la Manera Correcta')
            ->with('icono','success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
        ]);
        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Se Modifico el Rol de la Manera Correcta')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Se Elimino el Rol de la Manera Correcta')
            ->with('icono','success');
    }
}
