<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LibroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('libro')->group(function () {
    Route::get('/',[ LibroController::class, 'getAll']);
    Route::post('/',[ LibroController::class, 'create']);
    Route::delete('/{id}',[ LibroController::class, 'delete']);
    Route::get('/{id}',[ LibroController::class, 'get']);
    Route::put('/{id}',[ LibroController::class, 'update']);
  
    
});
Route::prefix('proveedor')->group(function () {
    Route::get('/',[ LibroController::class, 'getproveedor']);
    Route::post('/',[ LibroController::class, 'createEmpredos']);
});
Route::prefix('empresa')->group(function () {
    Route::get('/',[ LibroController::class, 'getempresa']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
