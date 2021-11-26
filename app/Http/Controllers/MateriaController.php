<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('mat_materia')->get();
        return view('materia.index', ['materias' => $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('materia.create');
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
            'nombre' => 'required|string|max:100',
        ];
        $mensajes= [
            "required"=>'El :attribute es requerido'
        ];
        
        $this->validate($request, $campos, $mensajes);

        $datosMateria = request()->except('_token');
        DB::table('mat_materia')->insert(['mat_nombre' => $datosMateria['nombre'],
        ]);
        return redirect('materia')->with('Mensaje', 'Materia agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materia = DB::table('mat_materia')->where('mat_id', '=', $id)->get();
        return view('materia.edit', ['informacion' => $materia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
        ];
        $mensajes= [
            "required"=>'El :attribute es requerido'
        ];
        
        $this->validate($request, $campos, $mensajes);
        $datosMateria = request()->except(['_token', '_method']);
        DB::table('mat_materia')->where('mat_id', $id)->update(['mat_nombre' => $datosMateria['nombre']]);
        return redirect('materia')->with('Mensaje', 'Materia modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('mat_materia')->where('mat_id', '=', $id)->delete();
        return redirect('materia')->with('Mensaje', 'Materia eliminada');
    }
}
