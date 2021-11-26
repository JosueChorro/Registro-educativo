<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $datos = DB::table('alm_alumno')->get();
        return view('buscar.index', ['datos' => $datos]);
    }

    public function getInfo(Request $request, $id){
        if($request->ajax()){
            $informacion = info($id);
            return response()->json($informacion);
        }
    }

    public function show($id)
    {
    }

    public function info($id){
        //return Estudiante::where('alm_id', $id)->get();
        return DB::table('alm_alumno')->where('alm_id', '=', $id)->get();
    }
}