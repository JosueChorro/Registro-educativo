<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = DB::table('alm_alumno')->get();
        $datosGrado = DB::table('grd_grado')->get();
        return view('estudiante.index', ['estudiantes' => $datos, 'grados' => $datosGrado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos = DB::table('grd_grado')->get();
        return view('estudiante.create', ['grados' => $datos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:300',
            'codigo' => 'required|string|max:100',
            'edad' => 'required|int|max:100|min: 5',
            'sexo' => 'required',
            'grado' => 'required|int|max:12|min:1',
            'observacion' => 'required|string|max:300'
        ];
        $mensajes= [
            "required"=>'El :attribute es requerido',
            "int"=>' El :attribute no es un numero',
        ];
        
        $this->validate($request, $campos, $mensajes);

        $datosEstudiante = request()->except('_token');
        DB::table('alm_alumno')->insert([
            'alm_codigo' => $datosEstudiante['codigo'],
            'alm_nombre' => $datosEstudiante['nombre'],
            'alm_edad' => intval($datosEstudiante['edad']),
            'alm_sexo' => $datosEstudiante['sexo'],
            'alm_id_grd' => intval($datosEstudiante['grado']),
            'alm_observacion' => $datosEstudiante['observacion'],
        ]);
        return redirect('estudiante')->with('Mensaje', 'Estudiante agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estudiante = DB::table('alm_alumno')->where('alm_id', '=', $id)->get();
        $datos = DB::table('grd_grado')->get();
        return view('estudiante.edit', ['informacion' => $estudiante, 'grados' => $datos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'nombre' => 'required|string|max:300',
            'codigo' => 'required|string|max:100',
            'edad' => 'required|int|max:100|min: 5',
            'sexo' => 'required',
            'grado' => 'required|int|max:12|min:1',
            'observacion' => 'required|string|max:300'
        ];
        $mensajes= [
            "required"=>'El :attribute es requerido',
            "int"=>' El :attribute no es un numero',
        ];
        
        $this->validate($request, $campos, $mensajes);
        $datosEstudiante = request()->except(['_token', '_method']);
        DB::table('alm_alumno')->where('alm_id', $id)->update([
            'alm_codigo' => $datosEstudiante['codigo'],
            'alm_nombre' => $datosEstudiante['nombre'],
            'alm_edad' => intval($datosEstudiante['edad']),
            'alm_sexo' => $datosEstudiante['sexo'],
            'alm_id_grd' => intval($datosEstudiante['grado']),
            'alm_observacion' => $datosEstudiante['observacion'],
        ]);
        return redirect('estudiante')->with('Mensaje', 'Estudiante modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('alm_alumno')->where('alm_id', '=', $id)->delete();
        return redirect('estudiante')->with('Mensaje', 'Estudiante borrado');
    }
}
