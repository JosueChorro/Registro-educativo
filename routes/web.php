<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MateriaXGradoController;
use App\Http\Controllers\BuscarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('estudiante', EstudianteController::class);
Route::resource('materia', MateriaController::class);
Route::resource('buscar', BuscarController::class);
//Route::get('buscar/{id}', 'BuscarController@getInfo');
Route::get('buscar/{id}/estudiantes', [BuscarController::class, 'info']);
Route::resource('grado', GradoController::class);
Route::resource('materiasxgrado', MateriaXGradoController::class);
