<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'index']);
Route::post('/agregar', [TaskController::class, 'create']);
Route::get('/consultar', [TaskController::class, 'all']);
Route::get('/consultar/{id}', [TaskController::class, 'getTask']);
Route::put('/editar/{id}', [TaskController::class, 'edit']);
Route::delete('/borrar/{id}', [TaskController::class, 'delete']);
Route::put('/completa/{id}', [TaskController::class, 'completed']);
