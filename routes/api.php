<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\ServicioApiController;
use App\Http\Controllers\Api\ChatController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 🔓 públicas (si quieres)
Route::get('/servicios', [ServicioApiController::class, 'index']);

// 🔒 PROTEGIDAS
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/clientes', [ClienteApiController::class, 'store']);
    Route::get('/clientes', [ClienteApiController::class, 'index']);
    Route::get('/clientes/{id}', [ClienteApiController::class, 'show']);

    //Route::post('/chat', [ChatController::class, 'chat']);

});

// 👇 SOLO PARA PRUEBAS
Route::get('/test-chat', function () {
    return app(\App\Services\OpenAIService::class)
        ->interpretarPregunta("cuantos clientes hay");
});
