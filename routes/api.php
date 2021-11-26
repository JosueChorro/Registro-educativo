<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('buscar/{id}/estudiantes', [BuscarController::class, 'info']);
