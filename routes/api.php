<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\ServicioApiController;
use App\Http\Controllers\Api\ChatController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/servicios', [ServicioApiController::class, 'index']);

Route::post('/clientes', [ClienteApiController::class, 'store']);

Route::get('/clientes', [ClienteApiController::class, 'index']);

Route::get('/clientes/{id}', [ClienteApiController::class, 'show']);

Route::post('/chat', [ChatController::class, 'chat']);
