<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.estudiantes.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:estudiantes',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'ref_celular' => 'required',
            'parentesco' => 'required',
            'profesion' => 'required',
            'direccion' => 'required',
            'rol' => 'required',
            'email' => 'required|unique:users',
            'foto' => 'required|image'
        ]);
        $usuario = new User();
        $usuario->name = $request->nombres." ".$request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->assignRole($request->rol);

        $estudiante = new Estudiante();
        $estudiante->usuario_id = $usuario->id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->ref_celular = $request->ref_celular;
        $estudiante->parentesco = $request->parentesco;
        $estudiante->direccion = $request->direccion;
        $estudiante->profesion = $request->profesion;

        $foto = $request->file('foto');
        $nombreArchivo = time(). '_' . $foto->getClientOriginalName();
        $rutaDestino = public_path('uploads/fotos_estudiantes');
        $foto->move($rutaDestino, $nombreArchivo);
        $fotoPath = 'uploads/fotos_estudiantes/' . $nombreArchivo;
        $estudiante->foto = $fotoPath;
        $estudiante->estado = "activo";

        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'El Estudiante Registrado Correctamente')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        $roles = Role::all();
        return view('admin.estudiantes.show',compact('estudiante','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        $roles = Role::all();
        return view('admin.estudiantes.edit',compact('estudiante','roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $estudiante = Estudiante::find($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:estudiantes,ci,'.$id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'profesion' => 'required',
            'rol' => 'required',
            'email' => 'required|unique:users,email,'.$estudiante->usuario->id,
            'foto' => 'nullable|image',
        ]);

        $usuario = User::find($estudiante->usuario->id);
        $usuario->name = $request->nombres." ".$request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->syncRoles($request->rol);

        $estudiante->usuario_id = $usuario->id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->ref_celular = $request->ref_celular;
        $estudiante->parentesco = $request->parentesco;
        $estudiante->direccion = $request->direccion;
        $estudiante->profesion = $request->profesion;

        if($request->hasfile('foto')){
            if($estudiante->foto && file_exists(public_path($estudiante->foto))){
                unlink(public_path($estudiante->foto));
            }
            
            $foto = $request->file('foto');
            $nombreArchivo = time(). '_' . $foto->getClientOriginalName();
            $rutaDestino = public_path('uploads/fotos_estudiantes');
            $foto->move($rutaDestino, $nombreArchivo);
            $fotoPath = 'uploads/fotos_estudiantes/' . $nombreArchivo;
            $estudiante->foto = $fotoPath;
            }

        $estudiante->estado = "activo";

        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'Se Actualizo los Datos del Estudiante de la Manera Correctamente')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $usuario = User::find($estudiante->usuario_id);

        if($estudiante->foto && file_exists(public_path($estudiante->foto))){
            unlink(public_path($estudiante->foto));
        }
        
        $estudiante->delete();
        $usuario->delete();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'Se Elimino los Datos del Estudiante Correctamente')
            ->with('icono','success');
    }
}
