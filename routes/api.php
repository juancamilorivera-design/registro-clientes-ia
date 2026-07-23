<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\ServicioApiController;

/*
|--------------------------------------------------------------------------
| Autenticación SPA (Next.js + Sanctum)
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/logout', [AuthApiController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

});

/*
|--------------------------------------------------------------------------
| Servicios
|--------------------------------------------------------------------------
*/

Route::get('/servicios', [ServicioApiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
*/

Route::post('/clientes', [ClienteApiController::class, 'store']);
Route::get('/clientes', [ClienteApiController::class, 'index']);
Route::get('/clientes/{id}', [ClienteApiController::class, 'show']);

/*
|--------------------------------------------------------------------------
| IA
|--------------------------------------------------------------------------
*/

Route::post('/chat', [ChatController::class, 'chat']);

Route::get('/test-chat', function () {
    return app(\App\Services\OpenAIService::class)
        ->interpretarPregunta("cuantos clientes hay");
});
