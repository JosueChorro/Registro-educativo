<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('grd_grado')->get();
        return view('grado.index', ['grados' => $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grado.create');
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

        $datosGrado = request()->except('_token');
        DB::table('grd_grado')->insert(['grd_nombre' => $datosGrado['nombre'],
        ]);
        return redirect('grado')->with('Mensaje', 'Grado agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grado = DB::table('grd_grado')->where('grd_id', '=', $id)->get();
        return view('grado.edit', ['informacion' => $grado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grado  $grado
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
        $datosGrado = request()->except(['_token', '_method']);
        DB::table('grd_grado')->where('grd_id', $id)->update(['grd_nombre' => $datosGrado['nombre']]);
        return redirect('grado')->with('Mensaje', 'Grado modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('grd_grado')->where('grd_id', '=', $id)->delete();
        return redirect('grado')->with('Mensaje', 'Grado borrado');
    }
}
