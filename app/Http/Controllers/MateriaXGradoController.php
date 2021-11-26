<?php

namespace App\Http\Controllers;

use App\Models\MateriaXGrado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaXGradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = DB::table('mxg_materiasxgrado')->get();
        $datosGrado = DB::table('grd_grado')->get();
        $datosMateria = DB::table('mat_materia')->get();
        return view('materiasxgrado.index', ['materiasxgrados' => $datos, 'grados' => $datosGrado, 'materias' => $datosMateria]);
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
        $datosMateria = DB::table('mat_materia')->get();
        return view('materiasxgrado.create', ['grados' => $datos, 'materias' => $datosMateria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'grado' => 'required|int|max:12|min:1',
            'materia' => 'required|int|max:100|min:1',
        ];
        $mensajes= [
            "required"=>'El :attribute es requerido',
            "int"=>' El :attribute no es un numero',
        ];
        
        $this->validate($request, $campos, $mensajes);

        $datosMXG = request()->except('_token');
        DB::table('mxg_materiasxgrado')->insert([
            'mxg_id_grd' => intval($datosMXG['grado']),
            'mxg_id_mat' => intval($datosMXG['materia']),
        ]);
        return redirect('materiasxgrado')->with('Mensaje', 'Informacion agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MateriaXGrado  $materiaXGrado
     * @return \Illuminate\Http\Response
     */
    public function show(MateriaXGrado $materiaXGrado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MateriaXGrado  $materiaXGrado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mxg = DB::table('mxg_materiasxgrado')->where('mxg_id', '=', $id)->get();
        $datos = DB::table('grd_grado')->get();
        $datosMateria = DB::table('mat_materia')->get();
        return view('materiasxgrado.edit', ['informacion' => $mxg, 'grados' => $datos, 'materias' => $datosMateria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MateriaXGrado  $materiaXGrado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'grado' => 'required|int|max:12|min:1',
            'materia' => 'required|int|max:100|min:1',
        ];
        $mensajes= [
            "required"=>'El :attribute es requerido',
            "int"=>' El :attribute no es un numero',
        ];
        
        $this->validate($request, $campos, $mensajes);
        $datosMXG = request()->except(['_token', '_method']);
        DB::table('mxg_materiasxgrado')->where('mxg_id', $id)->update([
            'mxg_id_grd' => intval($datosMXG['grado']),
            'mxg_id_mat' => intval($datosMXG['materia']),
        ]);
        return redirect('materiasxgrado')->with('Mensaje', 'Informacion modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MateriaXGrado  $materiaXGrado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('materiasxgrado')->where('mxg_id', '=', $id)->delete();
        return redirect('materiasxgrado')->with('Mensaje', 'Informacion borrada');
    }
}
