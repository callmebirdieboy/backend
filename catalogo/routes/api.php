<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta para obtener todos los registros (GET)
Route::get('/movies', [MovieController::class, 'index']);

// Ruta para obtener un registro específico por ID (GET)
Route::get('/movies/{id}', [MovieController::class, 'show']);

// Ruta para insertar un nuevo registro (POST)
Route::post('/movies', [MovieController::class, 'store']);

// Ruta para actualizar un registro específico (PUT)
Route::put('/movies/{id}', [MovieController::class, 'update']);

// Ruta para eliminar un registro específico (DELETE)
Route::delete('/movies/{id}', [MovieController::class, 'destroy']);
